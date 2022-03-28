import React, { useState } from "react";
import ReactDOM from "react-dom";

function Profile() {
    const handleModal = () => {
        setModalopen((modalopen) => !modalopen);
    };
    const [modalopen, setModalopen] = useState(false);
    return (
        <div className="profile-img-box mb-4 d-flex m-auto">
            <div
                className="modal"
                tabIndex="-1"
                role="dialog"
                style={{ display: modalopen ? "grid" : "none" }}
            >
                <div
                    className="modal-dialog"
                    role="document"
                    style={{ maxWidth: "418px" }}
                >
                    <div className="modal-content">
                        <div className="modal-header">
                            <h5 className="modal-title">Modal title</h5>
                            <button
                                type="button"
                                className="close btn btn-info"
                                data-dismiss="modal"
                                aria-label="Close"
                                onClick={handleModal}
                            >
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div className="modal-body">
                            <img
                                className="small-profile rounded c-pointer"
                                src="/images/profiles/tanjiro.jpg"
                                alt="Image"
                            />
                            <img
                                className="small-profile rounded c-pointer"
                                src="/images/profiles/tanjiro.jpg"
                                alt="Image"
                            />
                            <img
                                className="small-profile rounded c-pointer"
                                src="/images/profiles/tanjiro.jpg"
                                alt="Image"
                            />
                            <img
                                className="small-profile rounded c-pointer"
                                src="/images/profiles/tanjiro.jpg"
                                alt="Image"
                            />
                            <img
                                className="small-profile rounded c-pointer"
                                src="/images/profiles/tanjiro.jpg"
                                alt="Image"
                            />
                            <img
                                className="small-profile rounded c-pointer"
                                src="/images/profiles/tanjiro.jpg"
                                alt="Image"
                            />
                            <img
                                className="small-profile rounded c-pointer"
                                src="/images/profiles/tanjiro.jpg"
                                alt="Image"
                            />
                            <img
                                className="small-profile rounded c-pointer"
                                src="/images/profiles/tanjiro.jpg"
                                alt="Image"
                            />
                            <img
                                className="small-profile rounded c-pointer"
                                src="/images/profiles/tanjiro.jpg"
                                alt="Image"
                            />
                        </div>
                        <div className="modal-footer"></div>
                    </div>
                </div>
            </div>
            <img
                onClick={handleModal}
                className="h-100 w-100 round c-pointer"
                src="/images/profiles/tanjiro.jpg"
                alt="Image"
            />
        </div>
    );
}

export default Profile;

if (document.getElementById("profile-img")) {
    console.log("heye");
    ReactDOM.render(<Profile />, document.getElementById("profile-img"));
}
