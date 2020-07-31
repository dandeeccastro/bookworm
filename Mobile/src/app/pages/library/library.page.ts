import { Component, OnInit } from '@angular/core';
import { LibraryService } from "../../services/library.service";
import { ActivatedRoute } from "@angular/router";

@Component({
	selector: 'app-library',
	templateUrl: './library.page.html',
	styleUrls: ['./library.page.scss'],
})
export class LibraryPage implements OnInit {

	books: any;
	id: number;

	constructor(
		public library_service: LibraryService,
		private route: ActivatedRoute) { }

		ngOnInit() {
			this.route.paramMap.subscribe(params => {
				this.id = Number(params.get('libraryID'));
				this.library_service.getLibraryData(this.id).subscribe((res) => { 
					this.books = res.books;
					console.log(this.books)
				})	
			})
		}
}
