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
	constructor(
		public library_service: LibraryService,
		private route: ActivatedRoute) { }

		ngOnInit() {
			this.route.paramMap.subscribe(params => {
				this.library_service.getLibrary(Number(params.get('libraryID'))).subscribe((res) => { 
					this.library = res;
					console.log(this.library);
				})	
			})
		}

		DEBUG() {
			let no: any = {"existing":[{"id":1},{"id":2},{"id":3}]}
			this.library_service.addBooks(this.library.id,no).subscribe((res)=>{console.log(res)})
		}
}
