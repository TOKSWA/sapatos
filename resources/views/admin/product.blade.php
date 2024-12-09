<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <style type="text/css">
        /* Styling the title */
        .title {
            color: white;
            padding-top: 25px;
            font-size: 25px;
            text-align: center;
        }

        /* Styling the form wrapper */
        .form-wrapper {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Styling individual input fields */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
            color: #333;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
            color: #333;
        }

        .form-group input[type="file"] {
            padding: 8px;
            border: none;
        }

        /* Styling the submit button */
        .form-group input[type="submit"] {
            background-color: #28a745; /* Green background */
            color: white;
            font-size: 16px;
            cursor: pointer;
            border: none; /* Removing the border */
            padding: 12px 20px; /* Adjusting padding */
            border-radius: 5px;
        }

        .form-group input[type="submit"]:hover {
            background-color: #218838; /* Darker green on hover */
        }
    </style>
  </head>
  
  <!-- Required meta tags -->
  @include('admin.sidebar')
  @include('admin.navbar')

  <div class="container-fluid page-body-wrapper">
    <div class="form-wrapper">
      <h1 class="title">Add Product</h1>
        @if(session()->has('message'))

        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session()->get('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>

        @endif
      <form action="{{url('uploadproduct')}}" method="post" enctype="multipart/form-data">
        @csrf

        <!-- Product Title -->
        <div class="form-group">
          <label>Product Title</label>
          <input type="text" name="title" placeholder="Provide product title" required="">
        </div>

        <!-- Price -->
        <div class="form-group">
          <label>Price</label>
          <input type="number" name="price" placeholder="Provide product price" required="">
        </div>

        <!-- Description -->
        <div class="form-group">
          <label>Description</label>
          <input type="text" name="des" placeholder="Provide product description" required="">
        </div>

        <!-- Quantity -->
        <div class="form-group">
          <label>Quantity</label>
          <input type="number" name="quantity" placeholder="Provide product quantity" required="">
        </div>

        <!-- File Upload -->
        <div class="form-group">
          <input type="file" name="file" required="">
        </div>

        <!-- Submit Button -->
        <div class="form-group">
          <input type="submit" value="Add Product">
        </div>
      </form>
    </div>
  </div>

  @include('admin.script')
</body>
</html>
