import { Component, OnInit } from '@angular/core';
import { LibraryService } from "../../services/library.service";
import { ActivatedRoute } from "@angular/router";

@Component({
	selector: 'app-library',
	templateUrl: './library.page.html',
	styleUrls: ['./library.page.scss'],
})
export class LibraryPage implements OnInit {

	library:any;
	id:number;
	constructor(
		public library_service: LibraryService,
		private route: ActivatedRoute) { }

		ngOnInit() {
			this.route.paramMap.subscribe(params => {
				this.id = Number(params.get('libraryID'));
				this.library_service.getLibrary(this.id).subscribe((res) => { 
					this.library = res;
					console.log(this.library);
				})	
			})
		}

		DEBUG() {
			let no: any = {"shelves":[
				{"rows":3, "capacity":2,"index":1,"library_id": this.library.id},
				{"rows":2, "capacity":5,"index":2,"library_id": this.library.id},
				{"rows":4, "capacity":7,"index":3,"library_id": this.library.id}
			]}
			this.library_service.addShelves(this.library.id,no).subscribe((res)=>{console.log(res)})
		}
}
