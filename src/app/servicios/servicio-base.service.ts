import { Injectable } from '@angular/core';
import {HttpClient, HttpHeaders} from '@angular/common/http';
import { Observable} from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ServicioBaseService {

  private urlApi = "http://localhost/modelo2/productos";
  constructor(private http: HttpClient) { }

  httpGetAll(url: string): Observable<any>
  {
    return this.http.get<any>(this.urlApi+url);
    
  }

  httpGetString(url: string): Observable<any>
  {
    return this.http.get<any>(this.urlApi+url);
  }

  httpPostAdd(objeto: any, url:string): Observable<string>
  {
    return this.http.post<string>(this.urlApi+url, objeto, { responseType: 'text' as 'json' });
  }

  httpDelete(url:string):Observable<string>
  {
    return this.http.delete<string>(this.urlApi+url,{ responseType: 'text' as 'json' });
  }
}
