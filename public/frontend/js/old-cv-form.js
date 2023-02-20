const form = document.getElementById("cvForm");
let errors = {};

initEventsHandlers();

// =============== Start Add New Section ===============
const additionalSecsContainer = document.getElementById("additional-sections");
const templateLeftArea = document.querySelector(".template_left_area");
const templateRightArea = document.querySelector(".template_right_area");
const addSectionButtons = document.querySelectorAll(
    ".add-section-buttons .add-section-button"
);

const sections = {
    education: `
            
    `,
    experience: `
    <div class="row">
    <div class="col-xl-6">
        <div class="form-item">
            <label for="company">Company</label>
            <input type="text" class="form-control onKeyUpEvent" name="company" placeholder="Company">
        </div>
    </div>
    <div class="col-xl-6">
        <div class="form-item">
            <label for="job_title">Job Title</label>
            <input type="text" class="form-control onKeyUpEvent" name="job_title"
                placeholder="Job Title">
        </div>
    </div>
    <div class="col-xl-6">
        <div class="form-item">
            <label for="education_start_date">Start Date</label>
            <input type="date" class="form-control onChangeEvent" id="education_start_date"
                name="education_start_date">
        </div>
    </div>
    <div class="col-xl-6">
        <div class="form-item">
            <label for="education_end_date">End Date</label>
            <input type="date" class="form-control onChangeEvent" id="education_end_date"
                name="education_end_date">
        </div>
    </div>
    <div class="col-xl-12">
        <div class="form-item">
            <label for="experience_description">Description</label>
            <textarea name="experience_description" id="experience_description" class="form-control onKeyUpEvent"
                placeholder="Description" cols="30" rows="5"></textarea>
        </div>
    </div>
</div>
    `,
    projects: `
        <div class="row">
            <div class="col-xl-6">
                <div class="form-item">
                    <label for="project_title">Project Title</label>
                    <input type="text" class="form-control onKeyUpEvent" name="project_title" placeholder="Project Title">
                </div>
            </div>
            <div class="col-xl-6">
                <div class="form-item">
                    <label for="project_name">Project Name</label>
                    <input type="text" class="form-control onKeyUpEvent" name="project_name" placeholder="Project Name">
                </div>
            </div>
            <div class="col-xl-6">
                <div class="form-item">
                    <label for="education_start_date">Start Date</label>
                    <input type="date" class="form-control onChangeEvent" id="education_start_date" name="education_start_date">
                </div>
            </div>
            <div class="col-xl-6">
                <div class="form-item">
                    <label for="education_end_date">End Date</label>
                    <input type="date" class="form-control onChangeEvent" id="education_end_date" name="education_end_date">
                </div>
            </div>
            <div class="col-xl-12">
                <div class="form-item">
                    <label for="education_description">Description</label>
                    <textarea name="education_description" id="education_description" class="form-control onKeyUpEvent" placeholder="Description" cols="30" rows="5"></textarea>
                </div>
            </div>
        </div>
    `,

    // Languages and skills
    languages: `
    
    <div class="row">
    <div class="col-xl-6">
        <div class="form-item">
            <label for="languages">Language</label>
            <select name="languages[]" class="form-control onChangeEvent">
                <option value="" disabled selected>Language</option>
                <option value="arabic">Arabic</option>
                <option value="english">English</option>
            </select>
        </div>
    </div>

    <div class="col-xl-6">
        <div class="form-item">
            <label for="languages_level">Language Level</label>
            <select name="languages_level[]" class="form-control onChangeEvent">
                <option value="" disabled selected>Level</option>
                <option value="native">Native</option>
                <option value="chat">Chat</option>
                <option value="expert">Expert</option>
            </select>
        </div>
    </div>
</div>
    
    
    `,
};

addSectionButtons.forEach((addButton) => {
    const excludedSections = ["skills", "languages"];

    const sectionName = addButton.dataset.section_name;

    addButton.addEventListener("click", function (e) {
        additionalSecsContainer.innerHTML += `
                <section id="${sectionName}">
                  <h2 class="section-title">
                  ${sectionName}

                  <span class="remove-section" data-section_name="${sectionName}">
                    <i class="fas fa-times"></i>
                  </span>
                  
                  </h2>

                  <div id="${sectionName}-inputs">
                    ${sections[sectionName.trim().toLowerCase()]}
                  </div>
        
                </section>
          `;

        if (excludedSections.includes(sectionName.toLowerCase().trim())) {
            templateRightArea.innerHTML += `
                    <!-- Start Template Small Section -->
                    <div class="template_sm_section" id="">
                        <h5 class="template_sm_section_title">Languages</h5>

                        <!-- Start Template Small Section List -->
                        <ul class="template_sm_section_list">
                            <li class="template_sm_section_list_item">
                                <span class="template_sm_section_list_item_key"
                                    >Arabic</span
                                >
                                <span class="template_sm_section_list_item_value"
                                    >Native</span
                                >
                            </li>

                            <li class="template_sm_section_list_item">
                                <span class="template_sm_section_list_item_key"
                                    >English</span
                                >
                                <span class="template_sm_section_list_item_value"
                                    >chat</span
                                >
                            </li>

                            <li class="template_sm_section_list_item">
                                <span class="template_sm_section_list_item_key"
                                    >Key</span
                                >
                                <span class="template_sm_section_list_item_value"
                                    >value</span
                                >
                            </li>
                        </ul>
                        <!-- End Template Small Section List -->
                    </div>
            `;
        } else {
            templateLeftArea.innerHTML += `
                <div class="template_section" id="template_${sectionName}_section">
                    <h2 class="template_sec_title bullet bullet-radius">${sectionName}</h2>
    
                    <!-- Start Template Section Info -->
                    <div class="template_sec_info">
                        <h4 class="template_sec_info_title">
                            Lorem ipsum dolor, sit amet consectetur
                            adipisicing
                        </h4>
    
                        <div class="template_sec_info_details">
                            <span class="template_sec_info_details_part template_sec_info_details_part_first">
                                <span>Information System</span> |
                            </span>
                            <span class="template_sec_info_details_part template_sec_info_details_part_second">
                                <span class="start">10/2018</span> - <span class="end">12/2022</span>
                            </span>
                        </div>
    
                        <p class="template_sec_text">
                            Lorem ipsum dolor, sit amet consectetur
                            adipisicing elit. Hic, nemo nostrum?
                            Suscipit minima sequi accusantium atque,
                            culpa sunt eum incidunt aut omnis vel
                            ipsum maiores debitis eveniet aliquam,
                            eius
                        </p>
                    </div>
                    <!-- End Template Section Info -->
                </div>`;
        }

        initEventsHandlers();
        this.disabled = true;
    });
});

setInterval(() => {
    const removeSectionButton = document.querySelectorAll(`.remove-section`);

    removeSectionButton.forEach((btn) => {
        btn.addEventListener("click", () => {
            document.getElementById(`${btn.dataset.section_name}`).remove();

            document.getElementById(
                `add-${btn.dataset.section_name.trim().toLowerCase()}-button`
            ).disabled = false;

            document
                .getElementById(`template_${btn.dataset.section_name}_section`)
                .remove();
        });
    });
}, 1000);

// =============== End Add New Section ===============

// =============== Start Events ===============

function handleKeyUpEvent(event) {
    const input = event.target;

    setDOMElement(input, "name", "#template_person_name");
    setDOMElement(input, "title", "#template_person_title");
    setDOMElement(input, "email", "#template_person_email");
    setDOMElement(input, "phone", "#template_person_phone");
    setDOMElement(input, "address", "#template_person_address");
    setDOMElement(input, "about_me", "#template_about_me");

    setDOMElement(
        input,
        "university",
        "#template_Education_section .template_sec_info_title"
    );
    setDOMElement(
        input,
        "specialization",
        "#template_Education_section .template_sec_info_details_part_first span"
    );
    setDOMElement(
        input,
        "education_description",
        "#template_Education_section .template_sec_text"
    );

    setDOMElement(
        input,
        "company",
        "#template_Experience_section .template_sec_info_title"
    );
    setDOMElement(
        input,
        "job_title",
        "#template_Experience_section .template_sec_info_details_part_first span"
    );
    setDOMElement(
        input,
        "experience_description",
        "#template_Experience_section .template_sec_text"
    );
}
let languages = [];
let name = "";
let level = "";

function handleOnChangeEvent(event) {
    const input = event.target;

    setDOMElement(input, "date_of_birth", "#template_person_date_of_birth");
    setDOMElement(input, "nationality", "#template_person_nationality");

    setDOMElement(
        input,
        "education_start_date",
        "#template_Education_section .template_sec_info_details_part_second .start"
    );
    setDOMElement(
        input,
        "education_end_date",
        "#template_Education_section .template_sec_info_details_part_second .end"
    );
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
        document.querySelector(DOMElementID).textContent = input.value;
}

function initEventsHandlers() {
    handleEachEvent(form.querySelectorAll(".onKeyUpEvent"));
    handleEachEvent(form.querySelectorAll(".onChangeEvent"));
    handleEachEvent(form.querySelectorAll(".onFileUploadEvent"));
}

// =============== End Events ===============
