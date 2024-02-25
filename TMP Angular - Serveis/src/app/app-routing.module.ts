import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import {ListaUsuariosComponent} from "./lista-usuarios/lista-usuarios.component";
import { RegisterComponentComponent } from './auth/register-component/register-component.component';
import { LoginComponentComponent } from './auth/login-component/login-component.component';
import { ListaXuxemonsComponent } from './lista-xuxemons/lista-xuxemons.component';
import { AuthComponent } from './auth/auth.component';

const routes: Routes = [
  { path: '', pathMatch: 'full', redirectTo: 'auth'},
  { path: 'auth', component: AuthComponent, children: [
    {path: '', pathMatch: 'full', redirectTo: 'register'},
    {path: 'register', component: RegisterComponentComponent},
    {path: 'login', component: LoginComponentComponent},
  ] },
  
  {path: 'lista-xuxemons', component: ListaXuxemonsComponent},
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
