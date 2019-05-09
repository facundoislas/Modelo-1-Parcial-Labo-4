import { Component, OnInit, Input, Output, EventEmitter} from '@angular/core';
import { ProductoServicioService } from 'src/app/servicios/producto-servicio.service';

@Component({
  selector: 'app-boton',
  templateUrl: './boton.component.html',
  styleUrls: ['./boton.component.css']
})
export class BotonComponent implements OnInit {

  @Input() id:number;
  @Output() borrado: EventEmitter<{}>;
  constructor(private mihttp:ProductoServicioService) {
    this.borrado = new EventEmitter();
   }

  ngOnInit() {
    //console.log(this.id);
  }

  borrar()
  {
    this.mihttp.borrar(this.id).subscribe(
      data => {console.log(data);
        this.borrado.emit()
      },
      error => console.log(error)
    )
    
  }


}
