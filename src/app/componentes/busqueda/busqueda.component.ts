import { Component, OnInit, Output, EventEmitter } from '@angular/core';
import { Producto } from 'src/app/clases/producto';
import { ProductoServicioService } from 'src/app/servicios/producto-servicio.service';


@Component({
  selector: 'app-busqueda',
  templateUrl: './busqueda.component.html',
  styleUrls: ['./busqueda.component.css']
})
export class BusquedaComponent implements OnInit {

  unProducto: Producto;
  @Output() resultadoBusqueda : EventEmitter<Producto>
  descripcion: string;
  constructor(private mihttp: ProductoServicioService) { 
    this.resultadoBusqueda = new EventEmitter<Producto>();
  }

  ngOnInit() {
  }

  buscar()
  {
    this.mihttp.listarUno(this.descripcion)
    .subscribe(
      data => {
        if(data)
        {this.unProducto = data;
        console.log(this.unProducto);
        this.resultadoBusqueda.emit(this.unProducto);
      }
        else
        {
          alert("no esta el producto");
        }
      },
      error =>{ console.log(error);
      alert("no esta")}
    )
  }

} 
