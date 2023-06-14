images_1.onchange = evt => {
    const [file] = images_1.files
    if (file) {
    //   preview_profile.src = URL.createObjectURL(file)
    // console.log("image : ", file)
        $('.images_1 > .card-body').html(`<img src="${URL.createObjectURL(file)}" class="rounded float-left" width="200px" height="200px" alt="...">`);
    }
}
images_2.onchange = evt => {
    const [file] = images_2.files
    if (file) {
    //   preview_profile.src = URL.createObjectURL(file)
    // console.log("image : ", file)
        $('.images_2 > .card-body').html(`<img src="${URL.createObjectURL(file)}" class="rounded float-left" width="200px" height="200px" alt="...">`);
    }
}
images_3.onchange = evt => {
    const [file] = images_3.files
    if (file) {
    //   preview_profile.src = URL.createObjectURL(file)
    // console.log("image : ", file)
        $('.images_3 > .card-body').html(`<img src="${URL.createObjectURL(file)}" class="rounded float-left" width="200px" height="200px" alt="...">`);
    }
}
images_4.onchange = evt => {
    const [file] = images_4.files
    if (file) {
    //   preview_profile.src = URL.createObjectURL(file)
    // console.log("image : ", file)
        $('.images_4 > .card-body').html(`<img src="${URL.createObjectURL(file)}" class="rounded float-left" width="200px" height="200px" alt="...">`);
    }
}