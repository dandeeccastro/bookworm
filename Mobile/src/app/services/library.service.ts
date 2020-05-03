import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http'
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class LibraryService {

  apiURL:string = "http://localhost:8000/api/"

  constructor(public http: HttpClient) { }

  getLibraries():Observable<any> { return this.http.get(this.apiURL + "library/"); }
  getLibrary(id:number):Observable<any> { return this.http.get(this.apiURL + "library/" + id); }
}
