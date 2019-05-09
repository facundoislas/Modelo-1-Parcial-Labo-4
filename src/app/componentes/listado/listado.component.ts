import { Component, OnInit } from '@angular/core';
import { Producto } from 'src/app/clases/producto';
import { ProductoServicioService } from 'src/app/servicios/producto-servicio.service';

@Component({
  selector: 'app-listado',
  templateUrl: './listado.component.html',
  styleUrls: ['./listado.component.css']
})
export class ListadoComponent implements OnInit {

  productos: Array<Producto>;

  constructor(private http: ProductoServicioService) { }

  ngOnInit() {

    this.mostrarLista();
  }

  mostrarLista()
  {
    this.http.listarTodos()
    .subscribe(
      data =>{ 
      this.productos = data;
      console.log(this.productos)
      });
  }



}
