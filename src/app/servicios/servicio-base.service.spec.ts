import { TestBed } from '@angular/core/testing';

import { ServicioBaseService } from './servicio-base.service';

describe('ServicioBaseService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: ServicioBaseService = TestBed.get(ServicioBaseService);
    expect(service).toBeTruthy();
  });
});
