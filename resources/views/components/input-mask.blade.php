<!-- resources/views/filament/components/input-mask.blade.php -->

<!-- Include the Inputmask library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/5.0.7-beta.0/inputmask.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const inputs = document.querySelectorAll('input[data-mask]');
        inputs.forEach(function (input) {
            Inputmask({ mask: input.getAttribute('data-mask') }).mask(input);
        });
    });
</script>
