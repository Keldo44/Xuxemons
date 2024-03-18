import {NgModule} from '@angular/core';
import {BrowserModule} from '@angular/platform-browser';
import {HttpClientModule} from "@angular/common/http";

import {AppRoutingModule} from './app-routing.module';
import {AppComponent} from './app.component';
import {BrowserAnimationsModule} from '@angular/platform-browser/animations';

// Components


// Angular Material
import {MatToolbarModule} from "@angular/material/toolbar";
import {MatButtonModule} from "@angular/material/button";
import {MatIconModule} from "@angular/material/icon";
import {MatMenuModule} from "@angular/material/menu";
import {MatCardModule} from "@angular/material/card";
import { RegisterComponentComponent } from './auth/register-component/register-component.component';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { LoginComponentComponent } from './auth/login-component/login-component.component';
import { ListaXuxemonsComponent } from './lista-xuxemons/lista-xuxemons.component';
import { AuthComponent } from './auth/auth.component';
import { ItemsComponent } from './items/items.component';
import { ItemComponent } from './items/item/item.component';
import { ItemComponent2 } from './inventory/item/item.component';
import { ItemComponent3 } from './adminitems/item/item.component';
import { AdminComponent } from './admin/admin.component';
import { InventoryComponent } from './inventory/inventory.component';
import { AdminitemsComponent } from './adminitems/adminitems.component';

@NgModule({
  declarations: [
    AppComponent,
    RegisterComponentComponent,
    LoginComponentComponent,
    ListaXuxemonsComponent,
    AuthComponent,
    ItemsComponent,
    ItemComponent,
    ItemComponent2,
    ItemComponent3,
    AdminComponent,
    InventoryComponent,
    AdminitemsComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    BrowserAnimationsModule,
    HttpClientModule,
    FormsModule,
    ReactiveFormsModule,

    // Angular Material
    MatToolbarModule,
    MatButtonModule,
    MatIconModule,
    MatMenuModule,
    MatCardModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule {
}
