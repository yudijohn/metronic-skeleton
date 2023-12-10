<div id="{{ $id }}" {{ $attributes->class( [ 'app-container', 'container-fluid' => $type == 'fluid', 'container-xxl' => $type == 'xxl' ] ) }}>
    {{ $slot }}
</div>