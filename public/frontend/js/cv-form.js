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

// ===== START WORKING WITH SECTIONS =====

// On click on remove section this method will remove the appropriate section
onRemoveSection();

onSectionDataChange([
    "education",
    "experience",
    "project",
    "skill",
    "language",
]);

// ===== END WORKING WITH SECTIONS =====

function onSectionDataChange(sectionNames) {
    sectionNames.forEach((sectionName) => {
        let sectionData = {};
        const sectionInputs = document.querySelectorAll(
            `.${sectionName}_input`
        );

        sectionInputs.forEach((input) => {
            input.addEventListener("change", (e) => {
                sectionData.id = e.target.dataset.id;
                sectionData[e.target.name] = e.target.value;

                ajaxUpdate({
                    [sectionName]: sectionData,
                });
            });
        });
    });
}

function onRemoveSection() {
    document.querySelectorAll(".remove-section").forEach((btn) => {
        btn.addEventListener("click", () => {
            switch (btn.dataset.section_name) {
                case "educations":
                    ajaxDeleteEducationSection();
                    break;
                case "experiences":
                    ajaxDeleteExperienceSection();
                    break;
                case "projects":
                    ajaxDeleteProjectSection();
                    break;
            }
        });
    });
}

function removeSection(sectionName) {
    $(`#${sectionName}`).remove();
    $(`#template_${sectionName}`).remove();
}

function appendSection(sections) {
    $(sections.form.selector).append(sections.form.html);
    $(sections.template.selector).append(sections.template.html);
    $(sections.addButton).attr("disabled", true);
}

function livePreview(data) {
    livePreviewMainData(data);
    livePreviewEducationData(data);
    livePreviewExperiencesData(data);
    livePreviewProjectsData(data);
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

function livePreviewExperiencesData(data) {
    const experiencesData = data.experiences;

    experiencesData.forEach((experience) => {
        $("#template_company").text(experience.company);
        $("#template_company_job_title").text(experience.company_job_title);
        $("#template_company_start_date").text(experience.company_start_date);
        $("#template_company_end_date").text(experience.company_end_date);
        $("#template_company_description").text(experience.company_description);
    });
}

function livePreviewProjectsData(data) {
    const projectsData = data.projects;

    projectsData.forEach((project) => {
        $("#template_project_title").text(project.project_title);
        $("#template_project_name").text(project.project_name);
        $("#template_project_start_date").text(project.project_start_date);
        $("#template_project_end_date").text(project.project_end_date);
        $("#template_project_description").text(project.project_description);
    });
}
