import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import {ListaUsuariosComponent} from "./lista-usuarios/lista-usuarios.component";
import { RegisterComponentComponent } from './register-component/register-component.component';
import { LoginComponentComponent } from './login-component/login-component.component';
import { ListaXuxemonsComponent } from './lista-xuxemons/lista-xuxemons.component';

const routes: Routes = [
  {path: 'register', component: RegisterComponentComponent},
  {path: 'login', component: LoginComponentComponent},
  {path: 'lista-xuxemons', component: ListaXuxemonsComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
