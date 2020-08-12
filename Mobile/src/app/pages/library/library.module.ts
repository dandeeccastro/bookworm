import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { LibraryPageRoutingModule } from './library-routing.module';

import { LibraryPage } from './library.page';
import { AddBookModalComponent } from '../../components/add-book-modal/add-book-modal.component';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    LibraryPageRoutingModule,
  ],
  declarations: [LibraryPage, AddBookModalComponent],
	entryComponents: [AddBookModalComponent] 
})
export class LibraryPageModule {}
