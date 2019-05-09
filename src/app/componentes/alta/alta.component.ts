import { Component, OnInit } from '@angular/core';
import { Producto } from 'src/app/clases/producto';
import { ProductoServicioService } from 'src/app/servicios/producto-servicio.service';
import { Validators, FormBuilder, FormControl, FormGroup } from '@angular/forms';

@Component({
  selector: 'app-alta',
  templateUrl: './alta.component.html',
  styleUrls: ['./alta.component.css']
})
export class AltaComponent implements OnInit {

  unProducto: Producto;
  constructor(private mihttp: ProductoServicioService, private builder: FormBuilder) {
    
    this.unProducto = new Producto();
   }

   descripcion = new FormControl('', [
    Validators.required,
    Validators.maxLength(20)
  ]);
  
  tipo = new FormControl('', [
    Validators.required,
    Validators.maxLength(9)
  ]);
  
  precio = new FormControl('', [
    Validators.required,
    Validators.min(0),
    Validators.max(100),
  ]);
  vencimiento = new FormControl('', [
    Validators.required,
    Validators.minLength(4)
  ]);

  registroForm: FormGroup = this.builder.group({
    descripcion: this.descripcion,
    tipo: this.tipo,
    precio: this.precio,
    fechaDeVencimiento: this.vencimiento
  });

  ngOnInit() {
    
  }

  alta()
  {
    
    this.mihttp.agregar(this.unProducto)
    .subscribe(
      data => alert(data),
      error => console.log(error)
    )
    window.location.reload();
  }

}
