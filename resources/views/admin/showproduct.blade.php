
<!DOCTYPE html>
<html lang="en">
  <head>

    

  @include('admin.css')
  
  </head>
    <!-- Required meta tags -->
    
      @include('admin.sidebar')
      @include ('admin.navbar')

        
      <div class="container-fluid page-body-wrapper">
            <div class="container" align="center">
      
            @if(session()->has('message'))

            <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session()->get('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

            @endif
            <table>
                    <tr style="background-color: gray;">
                        <td style="padding:20px">Title</td>
                        <td style="padding:20px">Description</td>
                        <td style="padding:20px">Quantity</td>
                        <td style="padding:20px">Price</td>
                        <td style="padding:20px">Image</td>
                        <td style="padding:30px">Update</td>
                        <td style="padding:20px">Delete</td>



                    </tr>

                    @foreach ($data as $product )
                        
                       
                        <tr style="background-color: black; align-items:center;">
                            <td>{{$product->title}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>{{$product->price}}</td>
                            <td>
                            <img height="200" width="200" src="/productimage/{{$product->image}}">

                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{url('updateview',$product->id)}}">Update</a>
                            </td>

                            <td>
                                <a class="btn btn-danger" href="{{url('deleteproduct',$product->id)}}">Delete</a>
                            </td>


                        </tr>

                    @endforeach

            </table>

            </div>
      </div>

      @include('admin.script')
  </body>
</html>