const form = document.getElementById("cvForm");
let errors = {};

initEventsHandlers();

// =============== Start Add New Section ===============
const additionalSecsContainer = document.getElementById("additional-sections");

const addEducationButton = document.getElementById("add-education-button");
const addExperienceButton = document.getElementById("add-experience-button");
const addProjectsButton = document.getElementById("add-projects-button");
const addLanguagesButton = document.getElementById("add-languages-button");
const addSkillsButton = document.getElementById("add-skills-button");

const single_education = `
          <div class="row">
              <div class="col-xl-6">
                <div class="form-item">
                    <label for="university">University</label>
                    <input type="text" class="form-control onKeyUpEvent" name="university" placeholder="University">
                </div>
              </div>

              <div class="col-xl-6">
                <div class="form-item">
                    <label for="specialization">Specialization</label>
                    <input type="text" class="form-control onKeyUpEvent" name="specialization" placeholder="Specialization">
                </div>
              </div>

              <div class="col-xl-6">
                <div class="form-item">
                    <label for="university_start_date">Start Date</label>
                    <input type="date" class="form-control onChangeEvent" id="university_start_date" name="university_start_date">
                </div>
              </div>

              <div class="col-xl-6">
                <div class="form-item">
                    <label for="university_end_date">End Date</label>
                    <input type="date" class="form-control onChangeEvent" id="university_end_date" name="university_end_date">
                </div>
              </div>

              <div class="col-xl-12">
                <div class="form-item">
                    <label for="university_description">Description</label>
                    <textarea name="university_description" id="university_description" class="form-control onKeyUpEvent" placeholder="Description" cols="30" rows="5"></textarea>
                </div>
              </div>
            </div>
`;

addEducationButton.addEventListener("click", function (e) {
    additionalSecsContainer.innerHTML += `
        <section id="education">
          <h2 class="section-title">
          ${addEducationButton.dataset.section_name}

          <span class="remove-section">
            <i class="fas fa-times"></i>
          </span>
          
          </h2>

          <div class="" id="education-inputs">
            ${single_education}
          </div>

          <button class="add-more mt-3" type="button">
              <i class="fas fa-plus"></i>
              Add More
          </button>
        </section>
  `;

    initEventsHandlers();
    addEducationButton.disabled = true;
});

// =============== End Add New Section ===============

// =============== Start Events ===============

function handleKeyUpEvent(event) {
    const input = event.target;

    setDOMElement(input, "name", "template_person_name");
    setDOMElement(input, "title", "template_person_title");
    setDOMElement(input, "email", "template_person_email");
    setDOMElement(input, "phone", "template_person_phone");
    setDOMElement(input, "address", "template_person_address");
    setDOMElement(input, "about_me", "template_about_me");
    // setDOMElement(input, "university", "template_about_me");
}

function handleOnChangeEvent(event) {
    const input = event.target;

    setDOMElement(input, "date_of_birth", "template_person_date_of_birth");
    setDOMElement(input, "nationality", "template_person_nationality");
}

function handleOnFileUploadEvents(event) {
    const file = event.target.files[0];

    if (file.type.startsWith("image")) {
        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = (event) => {
            document.getElementById("template_person_photo").src =
                event.target.result;
        };
    } else {
        event.target.value = "";
        errors.photo = "Please select a valid image (jpg, png, jpeg)";
    }
}

function handleEachEvent(eventElements) {
    eventElements.forEach((element) => {
        if (element.classList.contains("onKeyUpEvent")) {
            element.addEventListener("keyup", handleKeyUpEvent);
        } else if (element.classList.contains("onChangeEvent")) {
            element.addEventListener("change", handleOnChangeEvent);
        } else if (element.classList.contains("onFileUploadEvent")) {
            element.addEventListener("change", handleOnFileUploadEvents);
        }
    });
}

function removeImage() {
    // event.target.value = "";
}

function setDOMElement(input, inputName, DOMElementID) {
    if (input.name == inputName)
        document.getElementById(DOMElementID).textContent = input.value;
}

function initEventsHandlers() {
    handleEachEvent(form.querySelectorAll(".onKeyUpEvent"));
    handleEachEvent(form.querySelectorAll(".onChangeEvent"));
    handleEachEvent(form.querySelectorAll(".onFileUploadEvent"));
}

// =============== End Events ===============
