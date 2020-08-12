import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from "@angular/router";

import { AddBookModalComponent } from '../../components/add-book-modal/add-book-modal.component';
import { ModalController } from '@ionic/angular';

import { LibraryService } from "../../services/library.service";

@Component({
	selector: 'app-library',
	templateUrl: './library.page.html',
	styleUrls: ['./library.page.scss'],
})
export class LibraryPage implements OnInit {

	books: any;
	library: any;

	constructor(
		private library_service: LibraryService,
		private route: ActivatedRoute,
		private modalController: ModalController) { }

	ngOnInit() {
		this.route.paramMap.subscribe( params => {
			let id: number = Number( params.get('libraryID') );
			this.gatherLibraryInformation( id );
		});
	}

	private gatherLibraryInformation(libraryID: number): void { 
		this.library_service.getLibraryData( libraryID ).subscribe((res) => { 
			this.books = res.books;
			this.library = res.library;
		});
	}

	public async presentModal() {
		const modal = await this.modalController.create({
			component: AddBookModalComponent
		});

		return await modal.present();
	}
}
