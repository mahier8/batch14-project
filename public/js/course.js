const expand = document.querySelector('#expandForm');
const postForm = document.querySelector('#pfHide');
let courseidDiv = document.querySelector('#hiddenCourseId');

postForm.setAttribute('action', `index.php?action=createPost&courseid=${courseidDiv.textContent}`);
const editPost = document.querySelectorAll('.postEditBtn');
let postContainer = document.querySelector('.postContainer');
const cancelPost = document.querySelector('#pfCancelBtn');
const create = document.querySelector('#create');
const update = document.querySelector('#update');
const createh2 = document.querySelector('#createh2');
const updateh2 = document.querySelector('#updateh2');
let hide = true;

expand.addEventListener('click', function() {
    if (hide == false) {
        //Hide the form
        postForm.setAttribute('id', 'pfHide');
        expand.textContent = "Start";
        hide = true;
    } else {
        //Show the form
        postForm.setAttribute('id', 'postForm');
        expand.textContent = "Hide";
        hide = false;
    }
})

cancelPost.addEventListener('click', function() {
    //If the user clicks cancel, the form closes and reverts to 'create post'
    update.setAttribute('class', "elementHidden");
    create.removeAttribute('class', "elementHidden");
    create.classList.add('postHeader', 'pinkStyle');
    window.scrollTo(500, 294);
    postForm.setAttribute('id', 'pfHide');
    expand.textContent = "Start";
    hide = true;
    postForm.reset();

    //Reset button Elements
    let pfHeaderInput1 = postForm.firstElementChild.firstElementChild.nextElementSibling.firstElementChild; 
    let pfHeaderInput2 = postForm.firstElementChild.firstElementChild.nextElementSibling.firstElementChild.nextElementSibling; 
    let pfHeaderInput3 = postForm.firstElementChild.firstElementChild.nextElementSibling.lastElementChild; 
    pfHeaderInput1.setAttribute('selected', "selected");
    pfHeaderInput2.removeAttribute('selected');
    pfHeaderInput3.removeAttribute('selected');
    let pfFileType1Option1 = postForm.lastElementChild.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.firstElementChild.nextElementSibling.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.firstElementChild;
    let pfFileType1Option2 = postForm.lastElementChild.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.firstElementChild.nextElementSibling.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.firstElementChild.nextElementSibling; 
    let pfFileType1Option3 = postForm.lastElementChild.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.firstElementChild.nextElementSibling.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.firstElementChild.nextElementSibling.nextElementSibling; 
    pfFileType1Option1.setAttribute('selected', "selected");
    pfFileType1Option2.removeAttribute('selected');
    pfFileType1Option3.removeAttribute('selected');
    let pfFileType2Option1 = postForm.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.firstElementChild.nextElementSibling.nextElementSibling.lastElementChild.previousElementSibling.previousElementSibling.firstElementChild; 
    let pfFileType2Option2 = postForm.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.firstElementChild.nextElementSibling.nextElementSibling.lastElementChild.previousElementSibling.previousElementSibling.firstElementChild.nextElementSibling;
    let pfFileType2Option3 = postForm.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.firstElementChild.nextElementSibling.nextElementSibling.lastElementChild.previousElementSibling.previousElementSibling.firstElementChild.nextElementSibling.nextElementSibling;
    pfFileType2Option1.setAttribute('selected', "selected");
    pfFileType2Option2.removeAttribute('selected');
    pfFileType2Option3.removeAttribute('selected');
    let pfFileType3Option1 = postForm.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.lastElementChild.lastElementChild.previousElementSibling.previousElementSibling.firstElementChild;
    let pfFileType3Option2 = postForm.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.lastElementChild.lastElementChild.previousElementSibling.previousElementSibling.firstElementChild.nextElementSibling;
    let pfFileType3Option3 = postForm.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.lastElementChild.lastElementChild.previousElementSibling.previousElementSibling.lastElementChild;
    pfFileType3Option1.setAttribute('selected', "selected");
    pfFileType3Option2.removeAttribute('selected');
    pfFileType3Option3.removeAttribute('selected');
})


for (let i = 0; i < editPost.length; i++) {
    //If the user clicks 'edit post', post details populate the form
        editPost[i].addEventListener('click', function() {
            postForm.setAttribute('action', `index.php?action=updatePost&courseid=${courseidDiv.textContent}`);
            update.removeAttribute('class', "elementHidden");
            updateh2.removeAttribute('class', "elementHidden");
            updateh2.classList.add('postHeader', 'redStyle');
            create.setAttribute('class', "elementHidden");

            //Scrolling to the form
            window.scrollTo(500, 294);
            
            //Isolating the Post Elements
            let editPostParent = editPost[i].parentElement.parentElement.parentElement; 
            let postHeader = editPostParent.firstElementChild.firstElementChild; 
            let postTitle = editPostParent.firstElementChild.nextSibling.nextSibling.firstElementChild; 
            let postContent = editPostParent.lastElementChild.firstElementChild.nextElementSibling; 
            let postFileName1 = editPostParent.lastElementChild.firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.firstElementChild.firstElementChild; 
            let postFileType1 = editPostParent.lastElementChild.firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.firstElementChild.firstChild; 
            let postFileURL1 = editPostParent.lastElementChild.firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.firstElementChild.firstChild.nextSibling.href; 
            let postFileName2 = editPostParent.lastElementChild.firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.firstElementChild.nextElementSibling.firstElementChild; 
            let postFileType2 = editPostParent.lastElementChild.firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.firstElementChild.nextElementSibling.firstChild; 
            let postFileURL2 = editPostParent.lastElementChild.firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.firstElementChild.nextElementSibling.firstElementChild.href; 
            let postFileName3 = editPostParent.lastElementChild.firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.lastElementChild.lastElementChild; 
            let postFileURL3 = editPostParent.lastElementChild.firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.lastElementChild.lastElementChild.href;
            let postFileType3 = editPostParent.lastElementChild.firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.lastElementChild.firstChild;
            let postDueDate = editPostParent.lastElementChild.lastElementChild.previousElementSibling.previousElementSibling.lastChild;
            let postHiddenId = editPostParent.lastElementChild.lastElementChild.textContent;

            //Isolating the Form Input Fields
            let pfHeaderInput1 = postForm.firstElementChild.firstElementChild.nextElementSibling.firstElementChild; 
            let pfHeaderInput2 = postForm.firstElementChild.firstElementChild.nextElementSibling.firstElementChild.nextElementSibling; 
            let pfHeaderInput3 = postForm.firstElementChild.firstElementChild.nextElementSibling.lastElementChild; 
            let pfTitleInput = postForm.firstElementChild.nextElementSibling.firstElementChild.nextElementSibling; 
            let pfContentInput = postForm.firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.nextElementSibling;
            let pfFileName1 = postForm.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.firstElementChild.nextElementSibling.firstElementChild.nextElementSibling;
            let pfFileURL1 = postForm.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.firstElementChild.nextElementSibling.lastElementChild;  
            let pfFileType1Option1 = postForm.lastElementChild.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.firstElementChild.nextElementSibling.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.firstElementChild;
            let pfFileType1Option2 = postForm.lastElementChild.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.firstElementChild.nextElementSibling.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.firstElementChild.nextElementSibling; 
            let pfFileType1Option3 = postForm.lastElementChild.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.firstElementChild.nextElementSibling.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.firstElementChild.nextElementSibling.nextElementSibling; 
            let pfFileName2 = postForm.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.nextElementSibling;;
            let pfFileURL2 = postForm.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.firstElementChild.nextElementSibling.nextElementSibling.lastElementChild; 
            let pfFileType2Option1 = postForm.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.firstElementChild.nextElementSibling.nextElementSibling.lastElementChild.previousElementSibling.previousElementSibling.firstElementChild; 
            let pfFileType2Option2 = postForm.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.firstElementChild.nextElementSibling.nextElementSibling.lastElementChild.previousElementSibling.previousElementSibling.firstElementChild.nextElementSibling;
            let pfFileType2Option3 = postForm.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.firstElementChild.nextElementSibling.nextElementSibling.lastElementChild.previousElementSibling.previousElementSibling.firstElementChild.nextElementSibling.nextElementSibling;
            let pfFileName3 = postForm.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.lastElementChild.firstElementChild.nextElementSibling;
            let pfFileURL3 = postForm.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.lastElementChild.lastElementChild;
            let pfFileType3Option1 = postForm.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.lastElementChild.lastElementChild.previousElementSibling.previousElementSibling.firstElementChild;
            let pfFileType3Option2 = postForm.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.lastElementChild.lastElementChild.previousElementSibling.previousElementSibling.firstElementChild.nextElementSibling;
            let pfFileType3Option3 = postForm.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.lastElementChild.lastElementChild.previousElementSibling.previousElementSibling.lastElementChild;
            let pfDueDate = postForm.lastElementChild.previousElementSibling.previousElementSibling.previousElementSibling.firstElementChild.nextElementSibling;
            let pfHiddenId = postForm.lastElementChild.previousElementSibling.previousElementSibling;
            


            //Populating the Fields
            pfTitleInput.value = postTitle.textContent
            pfContentInput.value = postContent.textContent
            pfFileName1.value = postFileName1.textContent;
            pfFileURL1.value = postFileURL1;
            pfFileName2.value = postFileName2.textContent;
            pfFileURL2.value = postFileURL2;
            pfFileName3.value = postFileName3.textContent;
            pfFileURL3.value = postFileURL3;
            pfHiddenId.value = postHiddenId;
            pfDueDate.value = Date.parse(postDueDate.value + 'Z');
            
            

            if (postHeader.textContent.includes(pfHeaderInput1.value)) {
                pfHeaderInput1.setAttribute('selected', "selected");
                pfHeaderInput2.removeAttribute('selected');
                pfHeaderInput3.removeAttribute('selected');
            } else if (postHeader.textContent.includes(pfHeaderInput2.value)) {
                pfHeaderInput2.setAttribute('selected', "selected");
                pfHeaderInput1.removeAttribute('selected');
                pfHeaderInput3.removeAttribute('selected');
            } else if (postHeader.textContent.includes(pfHeaderInput3.value)) {
                pfHeaderInput3.setAttribute('selected', "selected");
                pfHeaderInput1.removeAttribute('selected');
                pfHeaderInput2.removeAttribute('selected');
            } 
            if (postFileType1 && postFileType1.textContent.includes(pfFileType1Option1.value)) {
                pfFileType1Option1.setAttribute('selected', "selected");
                pfFileType1Option2.removeAttribute('selected');
                pfFileType1Option3.removeAttribute('selected');
            } else if (postFileType1 && postFileType1.textContent.includes(pfFileType1Option2.value)) {
                pfFileType1Option2.setAttribute('selected', "selected");
                pfFileType1Option1.removeAttribute('selected');
                pfFileType1Option3.removeAttribute('selected');
            } else if (postFileType1 && postFileType1.textContent.includes(pfFileType1Option3.value)) {
                pfFileType1Option3.setAttribute('selected', "selected");
                pfFileType1Option1.removeAttribute('selected');
                pfFileType1Option2.removeAttribute('selected');
            } 
            if (postFileType2 && postFileType2.textContent.includes(pfFileType2Option1.value)) {
                pfFileType2Option1.setAttribute('selected', "selected");
                pfFileType2Option2.removeAttribute('selected');
                pfFileType2Option3.removeAttribute('selected');
            } else if (postFileType2 && postFileType2.textContent.includes(pfFileType2Option2.value)) {
                pfFileType2Option2.setAttribute('selected', "selected");
                pfFileType2Option1.removeAttribute('selected');
                pfFileType2Option3.removeAttribute('selected');
            } else if (postFileType2 && postFileType2.textContent.includes(pfFileType2Option3.value)) {
                pfFileType2Option3.setAttribute('selected', "selected");
                pfFileType2Option1.removeAttribute('selected');
                pfFileType2Option2.removeAttribute('selected');
            }
            if (postFileType3 && postFileType3.textContent.includes(pfFileType3Option1.value)) {
                pfFileType3Option1.setAttribute('selected', "selected");
                pfFileType3Option2.removeAttribute('selected');
                pfFileType3Option3.removeAttribute('selected');
            } else if (postFileType3 && postFileType3.textContent.includes(pfFileType3Option2.value)) {
                pfFileType3Option2.setAttribute('selected', "selected");
                pfFileType3Option1.removeAttribute('selected');
                pfFileType3Option3.removeAttribute('selected');
            } else if (postFileType3 && postFileType3.textContent.includes(pfFileType3Option3.value)) {
                pfFileType3Option3.setAttribute('selected', "selected");
                pfFileType3Option1.removeAttribute('selected');
                pfFileType3Option2.removeAttribute('selected');
            } 
            
            //Showing the form
            postForm.setAttribute('id', 'postForm');
            expand.textContent = "Hide";
            hide = false;
            
            
            // console.log(hiddenid);
        });
}

