function validateSize(input) {
  const fileSize = input.files[0].size / 1024 / 1024; // in MiB
  if (fileSize > 2) {
    input.value = null; //for clearing with Jquery
    alert('File size exceeds 2 MiB');
  } else {
    // Proceed further
  }

}
