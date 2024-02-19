import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ListaXuxemonsComponent } from './lista-xuxemons.component';

describe('ListaXuxemonsComponent', () => {
  let component: ListaXuxemonsComponent;
  let fixture: ComponentFixture<ListaXuxemonsComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [ListaXuxemonsComponent]
    });
    fixture = TestBed.createComponent(ListaXuxemonsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
