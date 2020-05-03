import { Component } from '@angular/core';
import { LibraryService } from '../services/library.service';

@Component({
  selector: 'app-tab1',
  templateUrl: 'tab1.page.html',
  styleUrls: ['tab1.page.scss']
})
export class Tab1Page {

  libraries:any[] ;
  query_results: any[];

  constructor(public library_service: LibraryService) { 
    this.library_service.getLibraries().subscribe((res) => {
      this.query_results = res;
      this.libraries = this.query_results;
    });
  }

  searchLibrary(search_string:any) {
    if (search_string !== ""){
      this.libraries = this.query_results.filter( (item:any) => { if ( item.name.search(search_string) !== -1 ) return item.name; });
    } else {
      this.libraries = this.query_results;
    }
  }

}
