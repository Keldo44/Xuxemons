import { Component } from '@angular/core';


@Component({
  selector: 'app-auth',
  templateUrl: './auth.component.html',
  styleUrls: ['./auth.component.css']
})
export class AuthComponent {
  changeAction() {
    if (this.action === 'login') {
      this.action = 'register';
    }else{
      this.action = 'login';
    }
  }
    title = 'Xuxemon | Guest';
    action: string = 'register';
  
}
