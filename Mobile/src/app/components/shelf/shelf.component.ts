import { Component, OnInit,Input } from '@angular/core';
import { LibraryService } from "../../services/library.service";

@Component({
  selector: 'app-shelf',
  templateUrl: './shelf.component.html',
  styleUrls: ['./shelf.component.scss'],
})
export class ShelfComponent implements OnInit {

	@Input() id:number;
	library_data:any;

  constructor( public library_service: LibraryService ) { 
	}

  ngOnInit() {
		this.library_service.getLibraryData(this.id).subscribe( (res) => {
			this.library_data = res;
			console.log("> [shelf.component] Printing library_data" )
			console.log(this.library_data)
		});
	}

}
