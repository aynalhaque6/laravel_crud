<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js">
</script>
{{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
<script>

    //=============== use image select and preview functions ===============//
    const imageInput = document.getElementById('imageInput');
    const previewImage = document.getElementById('previewImage');
    const customFileLabel = document.querySelector('.custom-file-label');

    // Listen for changes in the file input
    imageInput.addEventListener('change', function () {
        if (this.files.length > 0) {
            // If a file is selected, update the label text to display the file name
            customFileLabel.textContent = this.files[0].name;

            // Create a URL for the selected image and set it as the src of the img tag
            const file = this.files[0];
            const imageUrl = URL.createObjectURL(file);
            previewImage.src = imageUrl;
        } else {
            // If no file is selected, revert to the default label text and clear the image
            customFileLabel.textContent = 'Choose Student Photo';
            previewImage.src = ''; // Clear the image
        }
    });

    // //================ all students (show sweetalert dialog )
    
    // @if(session()->has('msg'))
    //         swal({
    //             title: "{{ session()->get('msg') }}",
    //             icon: "{{ session()->get('msg_type') }}",
    //             button: "OK"
    //         , });
    //     @endif

    //     // Listen for a click event on elements with the 'delete-button' class
    //     document.addEventListener('click', function (event) {
    //         if (event.target && event.target.classList.contains('delete-confirm')) {
    //             event.preventDefault(); // Prevent the default link behavior

    //             // Get the student's name from the data attribute
    //             const studentName = event.target.getAttribute('std_name');
    //             const stdId = event.target.getAttribute('std_id');
    //             const deleteUrl = "{{ route('delete.student', ':stdId') }}".replace(':stdId', stdId)

    //             swal({
    //                 title: "Confirmation?",
    //                 text: "Are you sure you want to delete " + studentName + "?",
    //                 icon: "warning",
    //                 buttons: ["Cancel", "Yes, Delete"],
    //                 dangerMode: true,
    //             })
    //             .then((willDelete) => {
    //                 if (willDelete) { 
    //                     window.location.href = deleteUrl;
    //                 } else {
    //                     swal("Student delete Cancelled!!!");
    //                 }
                
    //             });
    //         }
           
    //     });



</script>