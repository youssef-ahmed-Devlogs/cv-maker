const form = document.getElementById("cvForm");
const formData = {};

const additionalFormSections = document.getElementById(
    "additional_form_sections"
);
const templateLeftArea = document.querySelector(".template_left_area");
const templateRightArea = document.querySelector(".template_right_area");

const mainInformationInputs = document.querySelectorAll(
    "#main-information .main-input"
);

mainInformationInputs.forEach((input) => {
    input.addEventListener("change", function (e) {
        formData[e.target.name] = e.target.value;
        ajaxUpdate(formData);
    });
});

function appendSectionToForm(section, sectionSelector) {
    $(sectionSelector).append(section);
}

function appendSectionToTemplate(section, sectionSelector) {
    $(sectionSelector).append(section);
}

function livePreview(data) {
    livePreviewMainData(data);
    livePreviewEducationData(data);
}

function livePreviewMainData(data) {
    const mainData = data.mainFormData;
    $("#template_person_name").text(mainData.name);
    $("#template_person_title").text(mainData.job_title);
    $("#template_person_email").text(mainData.email);
    $("#template_person_phone").text(mainData.phone);
    $("#template_person_address").text(mainData.address);
    $("#template_person_date_of_birth").text(mainData.date_of_birth);
    $("#template_person_country").text(mainData.country);
    $("#template_about_me").text(mainData.about_me);
}

function livePreviewEducationData(data) {
    const educationsData = data.educations;
    educationsData.forEach((education) => {
        $("#template_university").text(education.university);
        $("#template_university_specialization").text(
            education.university_specialization
        );
        $("#template_university_start_date").text(
            education.university_start_date
        );
        $("#template_university_end_date").text(education.university_end_date);
        $("#template_university_description").text(
            education.university_description
        );
    });
}
