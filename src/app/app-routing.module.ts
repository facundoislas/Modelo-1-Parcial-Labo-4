import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import {ListadoComponent} from 'src/app/componentes/listado/listado.component';
import { ResultadoBusquedaComponent } from 'src/app/componentes/resultado-busqueda/resultado-busqueda.component';
import { AltaComponent } from 'src/app/componentes/alta/alta.component';

const routes: Routes = [
  {path:"productos", component: ListadoComponent,
  children:
  [
      {path:"alta", component: AltaComponent}]
  },
  {path:"busqueda", component: ResultadoBusquedaComponent},
  {path:"alta", component: AltaComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
