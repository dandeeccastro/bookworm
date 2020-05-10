import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http'
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class LibraryService {

  apiURL:string = "http://127.0.0.1:8000/api/"

  constructor(public http: HttpClient) { }

  getLibraries():Observable<any> { return this.http.get(this.apiURL + "library/"); }
  getLibrary(id:number):Observable<any> { return this.http.get(this.apiURL + "library/" + id); }
	addBooks(library_id:number,book_data:any):Observable<any> {
		return this.http.post(this.apiURL + "library/" + library_id + "/book",book_data);
	}
	addShelves(library_id:number,shelf_data:any):Observable<any> {
		return this.http.post(this.apiURL + "library/" + library_id + "/shelf",shelf_data);
	}
}
