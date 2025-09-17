<div class="card">
  <div class="card-body">
    <form action="{{ route('admin.add_post_product') }}" method="POST" id="addProductsForm">
      @csrf

      {{-- Поле с кодами продуктов --}}
      <div class="mb-3">
        <label for="product_codes" class="form-label">
          Enter Product Codes (one per line)
          <small class="text-muted ms-2">(<span id="codes_count">0</span>)</small>
        </label>
        <textarea class="form-control @error('product_codes') is-invalid @enderror"
                  id="product_codes" name="product_codes" rows="10"
                  placeholder="URTESTTEST12346AZ&#10;URTESTTEST12326AZ&#10;...">{{ old('product_codes') }}</textarea>
        @error('product_codes')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      {{-- Новое поле с confirmation-кодами --}}
      <div class="mb-3">
        <label for="product_confirmation_codes" class="form-label">
          Enter Product Confirmation Codes (one per line)
          <small class="text-muted ms-2">(<span id="conf_count">0</span>)</small>
        </label>
        <textarea class="form-control @error('product_confirmation_codes') is-invalid @enderror"
                  id="product_confirmation_codes" name="product_confirmation_codes" rows="10"
                  placeholder="12-символьные коды A–Z0–9, по одному на строку, соответствующие каждой строке слева&#10;NA7X3Y9QW2LP&#10;F4N8K0R1D2HZ&#10;...">{{ old('product_confirmation_codes') }}</textarea>
        @error('product_confirmation_codes')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <div id="line_mismatch" class="text-danger mt-2" style="display:none;">
          Количество строк в обоих полях должно совпадать.
        </div>
        <div class="form-text">
          Каждый confirmation-код строго из 12 символов: латинские заглавные буквы A–Z и цифры 0–9.
        </div>
      </div>

      {{-- Общие ошибки (например, несовпадение строк) --}}
      @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
      @endif

      <button type="submit" class="btn btn-primary" id="submitBtn">Add Products</button>
    </form>
  </div>
</div>

{{-- Простой JS-контроль количества строк и базовой валидации шаблона кода --}}
<script>
(function(){
  const codesTA = document.getElementById('product_codes');
  const confTA  = document.getElementById('product_confirmation_codes');
  const btn     = document.getElementById('submitBtn');
  const misMsg  = document.getElementById('line_mismatch');
  const c1      = document.getElementById('codes_count');
  const c2      = document.getElementById('conf_count');
  const CODE12  = /^[A-Z0-9]{12}$/;

  function countLines(v){
    return v.split(/\r?\n/).map(s => s.trim()).filter(Boolean);
  }

  function sync(){
    const L1 = countLines(codesTA.value);
    const L2 = countLines(confTA.value);
    c1.textContent = L1.length;
    c2.textContent = L2.length;
    const same = L1.length > 0 && L1.length === L2.length;
    misMsg.style.display = same ? 'none' : 'block';
    btn.disabled = !same;
  }

  // Дополнительно: при отправке проверим формат каждого confirmation-кода
  document.getElementById('addProductsForm').addEventListener('submit', function(e){
    const L2 = countLines(confTA.value);
    if (!L2.length) { e.preventDefault(); return; }
    for (const line of L2) {
      if (!CODE12.test(line)) {
        e.preventDefault();
        alert('Каждый confirmation-код должен быть ровно 12 символов (A–Z, 0–9). Ошибка: ' + line);
        return;
      }
    }
  });

  codesTA.addEventListener('input', sync);
  confTA.addEventListener('input', sync);
  sync();
})();
</script>
