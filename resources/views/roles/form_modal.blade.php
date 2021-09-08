<!--begin::Input group-->
<div class="fv-row mb-10">
	<!--begin::Label-->
	<label class="fs-5 fw-bolder form-label mb-2">
		<span class="required">Role name</span>
	</label>
	<!--end::Label-->
	<!--begin::Input-->
	<input type="hidden" name="id">
	<input class="form-control form-control-solid" placeholder="Enter a role name" name="name" />
	<!--end::Input-->
</div>
<!--end::Input group-->
<!--begin::Permissions-->
<div class="fv-row">
	<!--begin::Label-->
	<label class="fs-5 fw-bolder form-label mb-2">Role Permissions</label>
	<!--end::Label-->
	<!--begin::Table wrapper-->
	<div class="table-responsive">
		<!--begin::Table-->
		<table class="table align-middle table-row-dashed fs-6 gy-5">
			<!--begin::Table body-->
			<tbody class="text-gray-600 fw-bold">
				<!--begin::Table row-->
				<tr>
					<td class="text-gray-800">Administrator Access
					<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Allows a full access to the system"></i></td>
					<td>
						<!--begin::Checkbox-->
						<label class="form-check form-check-custom form-check-solid me-9">
							<input class="form-check-input" type="checkbox" value="" id="kt_roles_select_all" />
							<span class="form-check-label" for="kt_roles_select_all">Select all</span>
						</label>
						<!--end::Checkbox-->
					</td>
				</tr>
				<!--end::Table row-->
				<!--begin::Table row-->
				@foreach( config( 'system.permissions' ) as $key => $permissions )
					<tr>
						<td class="text-gray-800">{{ __( 'metronic::permissions.' . $key ) }}</td>
						<td>
							<!--begin::Wrapper-->
							<div class="d-flex">
								<!--begin::Checkbox-->
								@foreach( $permissions as $permission )
									<label class="form-check form-check-sm form-check-custom form-check-solid {{ ! $loop->last ? 'me-5 me-lg-20' : '' }}">
										<input class="form-check-input" type="checkbox" value="{{ $key }}.{{$permission}}" name="permissions[]" />
										<span class="form-check-label">{{ __( 'metronic::permissions.' . $permission ) }}</span>
									</label>
								@endforeach
								<!--end::Checkbox-->
							</div>
							<!--end::Wrapper-->
						</td>
					</tr>
				@endforeach
				<!--end::Table row-->
			</tbody>
			<!--end::Table body-->
		</table>
		<!--end::Table-->
	</div>
	<!--end::Table wrapper-->
</div>
<!--end::Permissions-->