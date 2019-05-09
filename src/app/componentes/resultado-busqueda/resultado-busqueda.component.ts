import { Component, OnInit } from '@angular/core';
import { Producto } from 'src/app/clases/producto';

@Component({
  selector: 'app-resultado-busqueda',
  templateUrl: './resultado-busqueda.component.html',
  styleUrls: ['./resultado-busqueda.component.css']
})
export class ResultadoBusquedaComponent implements OnInit {

  unProducto : Producto;
  constructor() { }

  ngOnInit() {
  }

  

}
