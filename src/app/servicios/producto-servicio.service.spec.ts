import { TestBed } from '@angular/core/testing';

import { ProductoServicioService } from './producto-servicio.service';

describe('ProductoServicioService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: ProductoServicioService = TestBed.get(ProductoServicioService);
    expect(service).toBeTruthy();
  });
});
