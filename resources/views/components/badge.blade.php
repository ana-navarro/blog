<div class="card-body">
    <p class="text-dark">{{ $title }}</p>
    <p class="col-12 text-muted">
        Adicionado em {{ \Carbon\Carbon::parse($date)->format('d/m/y') }}
    </p>
</div>
