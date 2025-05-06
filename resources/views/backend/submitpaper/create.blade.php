@extends('backend.layouts.app')


{{-- @section('page_description',__('Add Training')) --}}
{{-- @section('name')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}"> <i class="feather icon-home"></i> </a>
    </li>
    <li class="breadcrumb-item"><a href="#!">{{ __('Add Training') }}</a>
    </li>
@endsection --}}
@section('content')
<style>
    .publish-container {
      max-width: 900px;
      /* background: #fff; */
      background: linear-gradient(to bottom, #fff8fb 0, #d0fcf6 100%);
      padding: 30px;
      margin: 10px auto 30px; /* Increased top margin */
      border-radius: 15px;
      box-shadow: 0 0 30px rgba(0,0,0,0.1);
    }
body{
    background: linear-gradient(to bottom, #fffdf2 0, #ffeff5 100%);
}
    h2 {
      text-align: center;
      margin-bottom: 30px;
      color: #333;
    }

    .form-row {
      display: flex;
      justify-content: space-between;
      gap: 20px;
      margin-top: 20px;
      flex-wrap: wrap;
    }

    .form-group {
      flex: 1;
      min-width: 250px;
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-weight: 500;
      color: #555;
    }

    input, textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 14px;
    }

    .drop-zone {
      border: 2px dashed #ccc;
      padding: 20px;
      text-align: center;
      border-radius: 10px;
      position: relative;
      background-color: #f9f9f9;
      margin-top: 10px;
    }

    .drop-zone img {
      width: 60px;
      margin-bottom: 10px;
    }

    .drop-zone input {
      position: absolute;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      opacity: 0;
      cursor: pointer;
    }

    button {
      background: #007bff;
      color: #fff;
      padding: 12px 20px;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
      transition: background 0.3s ease;
      display: block;
      margin: 30px auto 0;
    }

    button:hover {
      background: #0056b3;
    }

    @media (max-width: 768px) {
      .form-row {
        flex-direction: column;
      }
    }
  </style>


<div class="publish-container">
  <h2>Paper Publication Registration</h2>
  @if (session('success'))
  <div id="flash-message" class="flash-message">
      {{ session('success') }}
  </div>
@endif
  <form action="{{ route('paper.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-row">
        <div class="form-group">
          <label>Author Name</label>
          <input type="text" name="author_name" required>
        </div>

        <div class="form-group">
          <label>Country</label>
          <input type="text" name="country" required>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group">
          <label>Corresponding Author Email</label>
          <input type="email" name="email" required>
        </div>

        <div class="form-group">
          <label>Co-Authors (comma-separated)</label>
          <input type="text" name="co_authors">
        </div>
      </div>

      <div class="form-row">
        <div class="form-group">
          <label>Contact Number</label>
          <input type="text" name="phone">
        </div>

        <div class="form-group">
          <label>Address</label>
          <textarea name="address" rows="1"></textarea>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group">
          <label>Paper ID</label>
          <input type="text" name="paper_id">
        </div>

        <div class="form-group">
          <label>Paper Title</label>
          <input type="text" name="paper_title" required>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group ">
            <label>Journal Name</label>
            <input type="text" name="journal_name" required>
        </div>

        <div class="form-group ">
            <label>Amount</label>
            <div class="input-group">
                <input type="text" name="amount"  placeholder="Enter Amount" required>
                <select name="currency"  required>
                    <option value="USD">USD (Dollar)</option>
                    <option value="INR">INR (Indian Rupee)</option>
                </select>

            </div>
        </div>
    </div>





    <!-- File Uploads -->
    <div class="form-group">
        <label>Final Manuscript (doc, docx)</label>
        <div class="drop-zone">
          <img src="https://cdn-icons-png.flaticon.com/512/3022/3022255.png" alt="Manuscript Icon" width="50">
          <p>Drop file here or click to upload</p>
          <input type="file" name="manuscript" accept=".doc,.docx" required>
          <div class="file-name"></div>
        </div>
      </div>

      <div class="form-group">
        <label>Copyright Form</label>
        <div class="drop-zone">
          <img src="https://cdn-icons-png.flaticon.com/512/1681/1681123.png" alt="Copyright Icon" width="50">
          <p>Drop file here or click to upload</p>
          <input type="file" name="copyright" required>
          <div class="file-name"></div>
        </div>
      </div>

      <div class="form-group">
        <label>Payment Receipt</label>
        <div class="drop-zone">
          <img src="https://cdn-icons-png.flaticon.com/512/929/929430.png" alt="Receipt Icon" width="50">
          <p>Drop file here or click to upload</p>
          <input type="file" name="payment_receipt" required>
          <div class="file-name"></div>
        </div>
      </div>


    <button type="submit">Submit Registration</button>
  </form>
</div>
</div>



<style>
    .drop-zone {
      border: 2px dashed #ccc;
      padding: 20px;
      text-align: center;
      cursor: pointer;
      position: relative;
    }

    .drop-zone input[type="file"] {
      opacity: 0;
      position: absolute;
      inset: 0;
      cursor: pointer;
    }

    .drop-zone .file-name {
      margin-top: 10px;
      font-weight: bold;
      color: #333;
    }

    .flash-message {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #4BB543;
        color: white;
        padding: 15px 25px;
        border-radius: 8px;
        font-size: 18px;
        z-index: 9999;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
  </style>
<script>
    document.querySelectorAll('.drop-zone input[type="file"]').forEach(input => {
      input.addEventListener('change', function () {
        const fileNameDiv = this.closest('.drop-zone').querySelector('.file-name');
        if (this.files.length > 0) {
          fileNameDiv.textContent = this.files[0].name;
        } else {
          fileNameDiv.textContent = '';
        }
      });
    });
  </script>
<script>
    setTimeout(() => {
        const flash = document.getElementById('flash-message');
        if (flash) {
            flash.style.transition = 'opacity 0.5s ease';
            flash.style.opacity = '0';
            setTimeout(() => flash.remove(), 500); // remove after fade-out
        }
    }, 3000); // 3 seconds
</script>
@endsection
@section('modal')

@endsection
@section('scripts')
    <script type="text/javascript" src="{{ asset('backend/plugins/i18next/js/i18next.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/plugins/i18next-xhr-backend/js/i18nextXHRBackend.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/plugins/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/plugins/jquery-i18next/js/jquery-i18next.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/plugins/summernote/summernote.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#description').summernote();
        });
    </script>
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote.css') }}">
@endsection
