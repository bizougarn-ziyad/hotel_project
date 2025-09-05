<!DOCTYPE html>
<html>
  @include('admin.head')
  
  <!-- Additional Luxury Styling -->
  <head>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
      /* Prevent horizontal scrolling */
      html, body {
        overflow-x: hidden;
        max-width: 100%;
      }
      
      body {
        font-family: 'Inter', sans-serif;
        background-color: #1a1a1a;
        min-height: 100vh;
        color: #e4e6ea;
      }
      
      /* Fix container and row overflow */
      .container-fluid {
        max-width: 100%;
        padding-left: 15px;
        padding-right: 15px;
      }
      
      .row {
        margin-left: 0;
        margin-right: 0;
      }
      
      .col-lg-8 {
        max-width: 100%;
        padding-left: 15px;
        padding-right: 15px;
      }
      
      /* Ensure form elements don't overflow */
      .form-control, .form-select {
        max-width: 100%;
        box-sizing: border-box;
      }
      
      /* Fix input group overflow */
      .input-group {
        max-width: 100%;
        flex-wrap: nowrap;
      }
      
      /* Responsive adjustments */
      @media (max-width: 768px) {
        .card-body {
          padding: 20px !important;
        }
        
        .col-md-6 {
          margin-bottom: 1rem;
        }
      }
      
      .form-control:focus, .form-select:focus {
        box-shadow: 0 0 0 0.25rem rgba(74, 144, 226, 0.25) !important;
        border-color: #4a90e2 !important;
        background-color: #2d2d2d !important;
        color: #e4e6ea !important;
      }
      
      .upload-area:hover {
        background: linear-gradient(45deg, #3a3a3a, #4a4a4a) !important;
        transform: translateY(-2px);
        transition: all 0.3s ease;
      }
      
      .card {
        backdrop-filter: blur(10px);
      }
      
      @keyframes fadeInUp {
        from {
          opacity: 0;
          transform: translateY(30px);
        }
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }
      
      .card {
        animation: fadeInUp 0.6s ease-out;
      }
      
      .form-group {
        animation: fadeInUp 0.6s ease-out;
        animation-fill-mode: both;
      }
      
      .mb-4, .mb-3 {
        animation: fadeInUp 0.6s ease-out;
        animation-fill-mode: both;
      }
      
      .mb-4:nth-child(1), .mb-3:nth-child(1) { animation-delay: 0.1s; }
      .mb-4:nth-child(2), .mb-3:nth-child(2) { animation-delay: 0.2s; }
      .mb-4:nth-child(3), .mb-3:nth-child(3) { animation-delay: 0.3s; }
      .mb-4:nth-child(4), .mb-3:nth-child(4) { animation-delay: 0.4s; }
      .mb-4:nth-child(5), .mb-3:nth-child(5) { animation-delay: 0.5s; }
    </style>
  </head>
  
  <body>
    <header>
        @include('admin.header')
    </header>
    
    <div class="d-flex align-items-stretch">
      @include('admin.sidebar')
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            
            <!-- Main Form Card -->
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="card border-0 shadow-lg" style="border-radius: 20px; background: #2d2d2d; border: 1px solid #3a3a3a;">
                  <div class="card-body p-5">
                    <form enctype="multipart/form-data" method="POST" action="{{ url('add_room') }}">
                        @csrf
                        
                        <!-- Room Title -->
                        <div class="mb-4">
                            <label class="form-label fw-bold mb-2" style="font-size: 1.1em; color: #e4e6ea !important;">
                              <i class="fas fa-bed mr-3" style="color: #4a90e2;"></i>Room Title
                            </label>
                            <input type="text" name="room_name" required 
                                   class="form-control form-control-lg border-0 shadow-sm" 
                                   style="border-radius: 15px; background-color: #3a3a3a; padding: 15px 20px; font-size: 1.1em; color: #e4e6ea; border: 1px solid #4a4a4a;"
                                   placeholder="Enter elegant room title...">
                        </div>

                        <!-- Room Type -->
                        <div class="mb-4">
                            <label class="form-label fw-bold mb-2" style="font-size: 1.1em; color: #e4e6ea !important;">
                              <i class="fas fa-hotel mr-3" style="color: #4a90e2;"></i>Room Type
                            </label>
                            <select name="room_type" 
                                    class="form-select form-select-lg border-0 shadow-sm" 
                                    style="border-radius: 15px; background-color: #3a3a3a; padding: 15px 20px; font-size: 1.1em; color: #e4e6ea; border: 1px solid #4a4a4a;">
                                <option value="single">🛏️ Single Room - Intimate Elegance</option>
                                <option value="double">🛏️🛏️ Double Room - Spacious Comfort</option>
                                <option value="suite" selected>👑 Suite - Ultimate Luxury</option>
                            </select>
                        </div>

                        <!-- Upload Image -->
                        <div class="mb-4">
                            <label class="form-label fw-bold mb-2" style="font-size: 1.1em; color: #e4e6ea !important;">
                              <i class="fas fa-camera mr-3" style="color: #4a90e2;"></i>Room Gallery
                            </label>
                            <div class="upload-area border-0 shadow-sm" id="uploadArea"
                                 style="border-radius: 15px; background: linear-gradient(45deg, #3a3a3a, #4a4a4a); padding: 30px; text-align: center; position: relative; overflow: hidden; border: 1px solid #4a4a4a; transition: all 0.3s ease;">
                                <div id="uploadPlaceholder">
                                    <i class="fas fa-cloud-upload-alt mb-3" style="font-size: 3em; color: #4a90e2; opacity: 0.7;"></i>
                                    <p class="mb-2" style="color: #b0b3b8; font-size: 1.1em;">Drag & drop your image here or click to browse</p>
                                    <small class="text-muted" style="color: #8a8d93 !important;">Supported formats: JPG, PNG, WebP (Max: 5MB)</small>
                                </div>
                                <div id="imagePreview" style="display: none;">
                                    <img id="previewImg" src="" alt="Preview" style="max-width: 200px; max-height: 150px; border-radius: 10px; margin-bottom: 10px;">
                                    <p id="fileName" style="color: #4a90e2; font-weight: bold; margin-bottom: 5px;"></p>
                                    <small style="color: #28a745;">✅ Image uploaded successfully</small>
                                    <br>
                                    <button type="button" id="changeImage" style="background: none; border: none; color: #4a90e2; text-decoration: underline; cursor: pointer; margin-top: 10px;">
                                        Change Image
                                    </button>
                                </div>
                                <input type="file" name="image" required id="imageInput"
                                       class="form-control border-0" 
                                       style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 0; cursor: pointer;"
                                       accept="image/*">
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <label class="form-label fw-bold mb-2" style="font-size: 1.1em; color: #e4e6ea !important;">
                              <i class="fas fa-align-left mr-3" style="color: #4a90e2;"></i>Room Description
                            </label>
                            <textarea name="description" rows="5" 
                                      class="form-control border-0 shadow-sm" 
                                      style="border-radius: 15px; background-color: #3a3a3a; padding: 20px; font-size: 1.1em; resize: vertical; color: #e4e6ea; border: 1px solid #4a4a4a;"
                                      placeholder="Describe the luxurious features and amenities of this room..."></textarea>
                        </div>

                        <!-- Amenities Row -->
                        <div class="row mb-4">
                          <!-- Free Wifi -->
                          <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold mb-2" style="font-size: 1.1em; color: #e4e6ea !important;">
                                  <i class="fas fa-wifi mr-3" style="color: #4a90e2;"></i>Complimentary WiFi
                                </label>
                                <select name="free_wifi" 
                                        class="form-select form-select-lg border-0 shadow-sm" 
                                        style="border-radius: 15px; background-color: #3a3a3a; padding: 15px 20px; font-size: 1.1em; color: #e4e6ea; border: 1px solid #4a4a4a;">
                                    <option value="yes" selected>✅ Yes - High speed</option>
                                    <option value="no">❌ No</option>
                                </select>
                            </div>
                          </div>

                          <!-- Price -->
                          <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold mb-2" style="font-size: 1.1em; color: #e4e6ea !important;">
                                  <i class="fas fa-dollar-sign mr-3" style="color: #4a90e2;"></i>Nightly Rate
                                </label>
                                <div class="input-group">
                                  <span class="input-group-text border-0 shadow-sm" 
                                        style="border-radius: 15px 0 0 15px; background: #4a90e2; color: white; font-weight: bold; font-size: 1.2em;">$</span>
                                  <input type="number" name="price" required min="0" step="0.01"
                                         class="form-control form-control-lg border-0 shadow-sm" 
                                         style="border-radius: 0 15px 15px 0; background-color: #3a3a3a; padding: 15px 20px; font-size: 1.1em; color: #e4e6ea; border: 1px solid #4a4a4a;"
                                         placeholder="0.00">
                                </div>
                            </div>
                          </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center mt-5">
                            <button type="submit" 
                                    class="btn btn-lg px-5 py-3 border-0 shadow-lg" 
                                    style="background: #4a90e2; 
                                           border-radius: 50px; 
                                           color: white; 
                                           font-size: 1.2em; 
                                           font-weight: 600; 
                                           letter-spacing: 1px; 
                                           text-transform: uppercase;
                                           transition: all 0.3s ease;
                                           box-shadow: 0 8px 25px rgba(74, 144, 226, 0.4);"
                                    onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 12px 35px rgba(74, 144, 226, 0.6)'; this.style.background='#3a7bc8';"
                                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 8px 25px rgba(74, 144, 226, 0.4)'; this.style.background='#4a90e2';">
                                <i class="fas fa-plus-circle mr-2"></i>
                                Create Room
                            </button>
                        </div>
                    
                    </form>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
        @include('admin.footer')
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const imageInput = document.getElementById('imageInput');
            const uploadArea = document.getElementById('uploadArea');
            const uploadPlaceholder = document.getElementById('uploadPlaceholder');
            const imagePreview = document.getElementById('imagePreview');
            const previewImg = document.getElementById('previewImg');
            const fileName = document.getElementById('fileName');
            const changeImageBtn = document.getElementById('changeImage');

            // Handle file input change
            imageInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    handleImageUpload(file);
                }
            });

            // Handle drag and drop
            uploadArea.addEventListener('dragover', function(e) {
                e.preventDefault();
                uploadArea.style.background = 'linear-gradient(45deg, #4a90e2, #5ba0f2)';
                uploadArea.style.transform = 'scale(1.02)';
            });

            uploadArea.addEventListener('dragleave', function(e) {
                e.preventDefault();
                if (!imageInput.files[0]) {
                    uploadArea.style.background = 'linear-gradient(45deg, #3a3a3a, #4a4a4a)';
                    uploadArea.style.transform = 'scale(1)';
                }
            });

            uploadArea.addEventListener('drop', function(e) {
                e.preventDefault();
                const files = e.dataTransfer.files;
                if (files.length > 0) {
                    const file = files[0];
                    if (file.type.startsWith('image/')) {
                        // Create a new FileList-like object and assign to input
                        const dt = new DataTransfer();
                        dt.items.add(file);
                        imageInput.files = dt.files;
                        handleImageUpload(file);
                    }
                }
                uploadArea.style.background = 'linear-gradient(45deg, #3a3a3a, #4a4a4a)';
                uploadArea.style.transform = 'scale(1)';
            });

            // Handle change image button
            changeImageBtn.addEventListener('click', function() {
                imageInput.click();
            });

            function handleImageUpload(file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    fileName.textContent = file.name;
                    
                    // Hide placeholder and show preview
                    uploadPlaceholder.style.display = 'none';
                    imagePreview.style.display = 'block';
                    
                    // Update upload area styling
                    uploadArea.style.background = 'linear-gradient(45deg, #1e3a5f, #2d5aa0)';
                    uploadArea.style.border = '2px solid #4a90e2';
                    uploadArea.style.padding = '20px';
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
  </body>
</html>