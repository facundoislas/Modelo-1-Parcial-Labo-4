import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import {FormsModule , ReactiveFormsModule} from '@angular/forms';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { ListadoComponent } from './componentes/listado/listado.component';
import {HttpClientModule} from '@angular/common/http';
import { BotonComponent } from './componentes/boton/boton.component';
import { BusquedaComponent } from './componentes/busqueda/busqueda.component';
import { ResultadoBusquedaComponent } from './componentes/resultado-busqueda/resultado-busqueda.component';
import { AltaComponent } from './componentes/alta/alta.component';


@NgModule({
  declarations: [
    AppComponent,
    ListadoComponent,
    BotonComponent,
    BusquedaComponent,
    ResultadoBusquedaComponent,
    AltaComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    FormsModule,
    ReactiveFormsModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
