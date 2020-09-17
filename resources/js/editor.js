import Stackedit from "stackedit-js";
import $, { post } from "jquery";
import axios from "axios";
import select2 from 'select2';

const el = document.querySelector(".editor");
var markdown;
const stackedit = new Stackedit();

$('.select2').select2();
$(".edit").on("click", function() {
    startEdit(false);
});

$(".new").on("click", function() {
    el.innerHTML = null;
    markdown = null;
});

$(".save").on("click", function() {
    var course = $(".course").val();
    var chapter = $(".chapter").val();
    var page = $(".page").val();

    axios
        .post(postEditor, {
            page: page,
            markdown: markdown
        })
        .then(response => {
            alert(response.data.message);
            console.log(response.data)
        })
        .catch(response => {
            alert(response.status + " " + response.data.message);
        });
});

$(".course").on("change", function() {
    var course = $(".course").val();
    /** chapters is route */
    axios
        .get(chapters, {
            params: {
                course: course
            }
        })
        .then(response => {
            updateChapters(response.data);
        })
        .catch(response => {
            alert(response.data.message);
        });
});

$(".chapter").on("change", function() {
    var chapter = $(".chapter").val();
    /** chapters is route */
    axios
        .get(pages, {
            params: {
                chapter: chapter
            }
        })
        .then(response => {
            updatePages(response.data);
        })
        .catch(response => {
            alert(response.data.message);
        });
});

$('.page').on('change', function () {
    var page = $('.page').val();
    if (!page) return false;
    axios.get(pageSingle, {
        params: {
            page: page
        }
    }).then((response) => {
        markdown = response.data.content;
        startEdit(true);
    }).catch( () => {
        alert('Error Occured');
    });
})

function startEdit(background) {
    const stackedit = new Stackedit();
    stackedit.on("fileChange", function onFileChange(file) {
        markdown = file.content.text;
        el.innerHTML = file.content.html;
    });
    stackedit.openFile(
        {
            name: "markdown",
            content: {
                text: markdown
            }
        },
        background
    );
}
function updateChapters(data) {
    const chapter = $(".chapter").get([0]);
    chapter.innerHTML = '<option value="">Select chapter...</option>';
    data.forEach(item => {
        chapter.innerHTML +=
            "<option value=" + item.id + ">" + item.name + "</option>";
    });
    const page = $(".page").get([0]);
    page.innerHTML = '<option value="">Select page...</option>';
}
function updatePages(data) {
    const page = $(".page").get([0]);
    page.innerHTML = '<option value="">Select page...</option>';
    data.forEach(item => {
        page.innerHTML +=
            "<option value=" + item.id + ">" + item.page_num + "</option>";
    });
}
