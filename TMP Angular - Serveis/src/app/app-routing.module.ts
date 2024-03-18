import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

import { RegisterComponentComponent } from './auth/register-component/register-component.component';
import { LoginComponentComponent } from './auth/login-component/login-component.component';
import { ListaXuxemonsComponent } from './lista-xuxemons/lista-xuxemons.component';
import { ItemsComponent } from './items/items.component';
import { InventoryComponent } from './inventory/inventory.component';

import { AuthComponent } from './auth/auth.component';
import { AdminComponent } from './admin/admin.component';


import { AuthGuard } from './guards/auth.guard';
import { AdminitemsComponent } from './adminitems/adminitems.component';

const routes: Routes = [
  { path: '', pathMatch: 'full', redirectTo: 'login'},
  { path: 'login', component: LoginComponentComponent},
  { path: 'register', component: RegisterComponentComponent},
  { path: 'lista-xuxemons', component: ListaXuxemonsComponent},
  { path: 'items', component: ItemsComponent, canActivate: [AuthGuard]},
  { path: 'inventory', component: InventoryComponent , canActivate: [AuthGuard]},
  { 
    path: 'admin',
    component: AdminComponent,
    canActivate: [AuthGuard],
    children: [
      { path: '', redirectTo: 'xuxemons', pathMatch: 'full' }, 
      { path: 'items', component: AdminitemsComponent },
      // Add more admin pages as needed
    ]
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
