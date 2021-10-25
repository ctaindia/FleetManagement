<?php

	use App\Http\Controllers\VendorController;
	use App\Http\Controllers\DriverController;
	use App\Http\Controllers\VehicleTypeController;
	use App\Http\Controllers\VehicleController;
	use App\Http\Controllers\BatteryDetailsController;
	use App\Http\Controllers\BatteryController;
	use App\Http\Controllers\BatterySupplierController;
	use App\Http\Controllers\BatteryTypeController;
	use App\Http\Controllers\GeoFencingController;

	
	Route::prefix('vendor')->group(function () {
		Route::get('list/{id?}', [VendorController::class, 'index'])->name('admin.vendor.list');
		Route::get('create', [VendorController::class, 'create'])->name('admin.vendor.create');
		Route::post('store', [VendorController::class, 'store'])->name('admin.vendor.store');
		Route::get('edit/{id}', [VendorController::class, 'edit'])->name('admin.vendor.edit');
		Route::post('update', [VendorController::class, 'update'])->name('admin.vendor.update');
		Route::get('delete/{id}', [VendorController::class, 'delete'])->name('admin.vendor.delete');
	});
	Route::prefix('driver')->group(function () {
		Route::get('list/{id?}', [DriverController::class, 'index'])->name('admin.driver.list');
		Route::get('create', [DriverController::class, 'create'])->name('admin.driver.create');
		Route::post('store', [DriverController::class, 'store'])->name('admin.driver.store');
		Route::get('edit/{id}', [DriverController::class, 'edit'])->name('admin.driver.edit');
		Route::post('update', [DriverController::class, 'update'])->name('admin.driver.update');
		Route::get('delete/{id}', [DriverController::class, 'delete'])->name('admin.driver.delete');
	});
	Route::prefix('vehicle/type')->group(function () {
		Route::get('list/{id?}', [VehicleTypeController::class, 'index'])->name('admin.vehicle.type.list');
		Route::get('create', [VehicleTypeController::class, 'create'])->name('admin.vehicle.type.create');
		Route::post('store', [VehicleTypeController::class, 'store'])->name('admin.vehicle.type.store');
		Route::get('edit/{id}', [VehicleTypeController::class, 'edit'])->name('admin.vehicle.type.edit');
		Route::post('update', [VehicleTypeController::class, 'update'])->name('admin.vehicle.type.update');
		Route::get('delete/{id}', [VehicleTypeController::class, 'delete'])->name('admin.vehicle.type.delete');
	});
	Route::prefix('vehicle')->group(function () {
		Route::get('list/{id?}', [VehicleController::class, 'index'])->name('admin.vehicles.list');
		Route::get('create', [VehicleController::class, 'create'])->name('admin.vehicles.create');
		Route::post('store', [VehicleController::class, 'store'])->name('admin.vehicles.store');
		Route::get('edit/{id}', [VehicleController::class, 'edit'])->name('admin.vehicles.edit');
		Route::post('update', [VehicleController::class, 'update'])->name('admin.vehicles.update');
		Route::get('delete/{id}', [VehicleController::class, 'delete'])->name('admin.vehicles.delete');
	});
	Route::prefix('battery-details')->group(function () {
		Route::get('list', [BatteryDetailsController::class, 'index'])->name('admin.battery-status.list');
		Route::get('create', [BatteryDetailsController::class, 'create'])->name('admin.battery-status.create');
		Route::post('store', [BatteryDetailsController::class, 'store'])->name('admin.battery-status.store');
		Route::get('edit/{id}', [BatteryDetailsController::class, 'edit'])->name('admin.battery-status.edit');
		Route::post('update', [BatteryDetailsController::class, 'update'])->name('admin.battery-status.update');
		Route::get('delete/{id}', [BatteryDetailsController::class, 'delete'])->name('admin.battery-status.delete');
	});
	Route::prefix('battery')->group(function () {
		Route::get('list', [BatteryController::class, 'index'])->name('admin.battery.list');
		Route::get('create', [BatteryController::class, 'create'])->name('admin.battery.create');
		Route::post('store', [BatteryController::class, 'store'])->name('admin.battery.store');
		Route::get('edit/{id}', [BatteryController::class, 'edit'])->name('admin.battery.edit');
		Route::post('update', [BatteryController::class, 'update'])->name('admin.battery.update');
		Route::get('delete/{id}', [BatteryController::class, 'delete'])->name('admin.battery.delete');
	});
	Route::prefix('battery-type')->group(function () {
		Route::get('list/{id?}', [BatteryTypeController::class, 'index'])->name('admin.battery-type.list');
		Route::get('create', [BatteryTypeController::class, 'create'])->name('admin.battery-type.create');
		Route::post('store', [BatteryTypeController::class, 'store'])->name('admin.battery-type.store');
		Route::get('edit/{id}', [BatteryTypeController::class, 'edit'])->name('admin.battery-type.edit');
		Route::post('update', [BatteryTypeController::class, 'update'])->name('admin.battery-type.update');
		Route::get('delete/{id}', [BatteryTypeController::class, 'delete'])->name('admin.battery-type.delete');
	});
	Route::prefix('battery-supplier')->group(function () {
		Route::get('list/{id?}', [BatterySupplierController::class, 'index'])->name('admin.battery-supplier.list');
		Route::get('create', [BatterySupplierController::class, 'create'])->name('admin.battery-supplier.create');
		Route::post('store', [BatterySupplierController::class, 'store'])->name('admin.battery-supplier.store');
		Route::get('edit/{id}', [BatterySupplierController::class, 'edit'])->name('admin.battery-supplier.edit');
		Route::post('update', [BatterySupplierController::class, 'update'])->name('admin.battery-supplier.update');
		Route::get('delete/{id}', [BatterySupplierController::class, 'delete'])->name('admin.battery-supplier.delete');
	});
	Route::prefix('geo-fencing')->group(function () {
		Route::get('/', [GeoFencingController::class, 'index'])->name('admin.geo-fencing.index');
		Route::get('create', [GeoFencingController::class, 'create'])->name('admin.geo-fencing.create');
		Route::post('store', [GeoFencingController::class, 'store'])->name('admin.geo-fencing.store');
		Route::get('detail/{id}', [GeoFencingController::class, 'detail'])->name('admin.geo-fencing.detail');
		Route::get('edit/{id}', [GeoFencingController::class, 'edit'])->name('admin.geo-fencing.edit');
		Route::post('update', [GeoFencingController::class, 'update'])->name('admin.geo-fencing.update');
		Route::get('delete/{id}', [GeoFencingController::class, 'delete'])->name('admin.geo-fencing.delete');
	});
?>