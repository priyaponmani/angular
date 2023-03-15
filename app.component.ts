import { Component } from '@angular/core';
import { ApiService } from './services/api.service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css'],
  providers:[ ApiService ]
})
export class AppComponent {
  title = 'restapi';
  data = [];
  Object = Object;
  constructor(private apiservice:ApiService){}

  ngOnInit(){   
    this.apiservice.getList().subscribe((data)=>{
     this.data = data;
      console.log(this.data); 
    })
  }  

  deleteRow(id:any){
    console.log(id);
    this.apiservice.deleteList(id).subscribe(data=>{
      this.data = data;
    })
  }

  addList(){
    this.apiservice.addList().subscribe(data=>{
      this.data = data;
    })
  }
}
