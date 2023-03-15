import { Injectable } from '@angular/core';
import { HttpClient,HttpHeaders} from '@angular/common/http';
import { Observable } from 'rxjs';

const httpOptions = {
    headers: new HttpHeaders({
      'Content-Type':  'application/json'
    })
};
const url = 'http://localhost/hcl/php/Rest.php';
@Injectable({
    providedIn: 'root',
  })
  
  export class ApiService {
    constructor(private httpClient: HttpClient){}
   
    public getList(): Observable<any> {
      return this.httpClient.get(url+'/?type=list',httpOptions);
    }

    public deleteList(id:any): Observable<any>{
      return this.httpClient.post(url+'/delete',id);
    }
    public addList(): Observable<any> {
      return this.httpClient.get(url+'/?add=add',httpOptions);
    }
  }