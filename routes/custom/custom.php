<?php

	use App\Http\Controllers\VendorController;
	use App\Http\Controllers\DriverController;
	use App\Http\Controllers\VehicleTypeController;
	use App\Http\Controllers\VehicleController;
	use App\Http\Controllers\BatteryDetailsController;

	
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
?>