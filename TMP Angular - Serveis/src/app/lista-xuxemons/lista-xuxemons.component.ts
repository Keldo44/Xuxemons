import {Component, OnInit} from '@angular/core';
import {Observable} from "rxjs";
import { UsersService } from '../services/users.service';
import { Xuxemon } from '../../models/xuxemon.model';
import { Router } from '@angular/router';
import { FormControl, FormGroup, FormsModule, NgModel, Validators } from '@angular/forms';



@Component({
  selector: 'app-lista-xuxemons',
  templateUrl: './lista-xuxemons.component.html',
  styleUrls: ['./lista-xuxemons.component.css']
})
export class ListaXuxemonsComponent implements OnInit {
/*xuxemonA: any;
/*getXuxemonA(id: number){
  const selectedXuxemon = this.xuxemons.find(xuxemon => xuxemon.id === id);
  if(selectedXuxemon){
    
    this.xuxemonA.type = selectedXuxemon.type ;
    this.xuxemonA.name = selectedXuxemon.name ;
    this.xuxemonA.img = selectedXuxemon.img
  }
  

}*/

  catchRandom() {
    this.usersService.catchXuxemonRand().subscribe({
      next: value => {
        console.log('Xuxemon Catched');
        this.updateXuxes();
      },
      error: err => console.error(err)
    });
  }
  

creatingXuxe: boolean;
changeCreatingXuxe() {
 this.creatingXuxe = !this.creatingXuxe;
}
  newXuxemon: Xuxemon;
  editing: number;
  xuxemons:Xuxemon[] = [];
  isAdmin:boolean = false;
  fotos:any[] = [];
  
  constructor( 
    public usersService: UsersService,
    private router: Router,
    ) {}
  createXuxeForm: FormGroup = new FormGroup({
    name: new FormControl('', [Validators.required]),
    type: new FormControl('', [Validators.required]),
    hp: new FormControl('', [Validators.required]),
    evo1: new FormControl('', [Validators.required]),
    evo2: new FormControl('', [Validators.required]),
  });


  ngOnInit() {
    //this.checkAdmin();
    this.editing =-1;
    if (this.isAdmin) {
      this.fillXuxes();
     
    }else{
      this.updateXuxes();
      
    }
    
    
  }
  create() {
    console.log(this.createXuxeForm.value);
    // this.newXuxemon.name = this.createXuxeForm.value.name;

    // this.newXuxemon.type = this.createXuxeForm.value.type;
    //console.log(this.newXuxemon);
    this.usersService.getUserRole().subscribe({
      next: value => {
        this.usersService.createXuxemon(this.createXuxeForm.value).subscribe({
          next: value => {
            console.log('Xuxemon Created');
            this.reloadXuxes();
          },
          error: err => console.error(err)
        });
      },
      error: err => this.router.navigate(['/auth/login'])
  });
  }
  changeEdit(id:number) {
    if (this.editing != id){
      this.editing = id;
    }else if(this.editing == -1){
      this.editing = id;
    }else{
      this.editing = -1;
    }
  }

  reloadXuxes() {
  
    if (this.isAdmin) {
      this.fillXuxes();
    }else{
      this.updateXuxes();
    }
  }
  

  fillXuxes() {
    this.usersService.getUserRole().subscribe({
      next: value => {
        this.usersService.getXuxemons().subscribe({
          next: value => {
            this.xuxemons = value;
            this.fillFotos();
          },
          error: err=> console.error( 'Error: ', err)
        });
      },
      error: err => this.router.navigate(['/auth/login'])
    });
    
  }
  checkAdmin() {
    if(localStorage.getItem('role')){
      localStorage.getItem('role') === 'administrador'? this.isAdmin = true : this.isAdmin = false;
    }
  }
  updateXuxes() {
    this.usersService.getXuxedex().subscribe({
      next: value => {
        // Assign the value to the component property
        this.xuxemons = value;
        this.fillFotos();
      },
      error: err => console.error('Error:', err)
    });
  }
  
  delete(id:number){
    this.usersService.getUserRole().subscribe({
      next: value => {
        this.usersService.deleteXuxemon(id).subscribe({
          next: value => {
            console.log('Delete: ', value)
            this.reloadXuxes();
          },
          error: err => console.error('Error:', err)
        });
      },
      error: err => this.router.navigate(['/auth/login'])
    });
  }

  edit(id: number) {
    const selectedXuxemon = this.xuxemons.find(xuxemon => xuxemon.id === id);


    if(selectedXuxemon){
      const formData = {
        id: selectedXuxemon.id,
        name: selectedXuxemon.name,
        type: selectedXuxemon.type,
        hp: selectedXuxemon.hp,
        // Add other properties as needed
      };
      this.usersService.getUserRole().subscribe({
        next: value => {
          this.usersService.editXuxemon(formData).subscribe({
            next: value => {
              console.log('Edit: ', value);
              this.changeEdit(formData.id);
              this.reloadXuxes();
            },
            error: err => console.error(err)
          });
        },
        error: err => this.router.navigate(['/auth/login'])
    });
  }
}
  fillFotos() {
    
    this.xuxemons.forEach(async xuxemon => {
      let fotoName = xuxemon.name.toLowerCase().normalize('NFD') + '.png';
      if (fotoName == '---.png'){
        fotoName = 'unknown.png';
      }
      
      const imageUrl = `../../assets/xuxemons/${fotoName}`;
    
      // Check if the image exists
      const imageExists = await this.imageExists(imageUrl);
    
      // Assign the image name accordingly
      xuxemon.img = imageExists ? fotoName : 'default.png';
    });
  }
  async imageExists(url: string): Promise<boolean> {
    return new Promise<boolean>(resolve => {
      const img = new Image();
      img.onload = () => resolve(true);
      img.onerror = () => resolve(false);
      img.src = url;
    });
  }

}

