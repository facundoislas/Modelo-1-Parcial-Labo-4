import { Injectable } from '@angular/core';
import {HttpClient, HttpHeaders} from '@angular/common/http';
import { Observable} from 'rxjs';
import { ServicioBaseService } from './servicio-base.service';

@Injectable({
  providedIn: 'root'
})
export class ProductoServicioService {

  constructor(private miHttp: ServicioBaseService) { }

  listarTodos(): Observable<any>
  {
    return this.miHttp.httpGetAll("/");
  }

  listarUno(cadena: string): Observable<any>
  {
      return this.miHttp.httpGetString("/busqueda/"+cadena);
  }

  agregar(objeto: any)
  {
      return this.miHttp.httpPostAdd(objeto, "/alta");
  }

  borrar(id:number)
  {
    return this.miHttp.httpDelete("/borrar/"+id);
  }


}
