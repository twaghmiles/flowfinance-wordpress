import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { Injector } from '@angular/core';
import { createCustomElement } from '@angular/elements';

import { BrowserAnimationsModule } from '@angular/platform-browser/animations';

import { MatSliderModule, MatInputModule, MatFormFieldModule, MatCardModule, MatButtonModule, MatSelectModule } from '@angular/material';
import { ChartModule } from 'angular2-chartjs';
import { NgxEchartsModule } from 'ngx-echarts';

import { AppComponent } from './app.component';

@NgModule({
  declarations: [
    AppComponent
  ],
  imports: [
    BrowserModule,
    BrowserAnimationsModule,
    MatSliderModule,
    MatInputModule,
    MatFormFieldModule,
    ChartModule,
    NgxEchartsModule,
    MatCardModule,
    MatButtonModule,
    MatSelectModule,
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule {
  constructor(private injector: Injector) {

  }

  ngDoBootstrap() {
    const el = createCustomElement(AppComponent, { injector: this.injector });
    customElements.define('loan-calculator', el);
  }
}
