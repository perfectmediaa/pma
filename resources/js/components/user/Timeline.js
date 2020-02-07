import React from 'react'
import ReactDOM from 'react-dom';
import './app.css';

function Timeline(){
    return(
        <div className="time">
        <h3 className="card-title">Your Ongoing Progress</h3>
        <div className="row">
            <div className="col-md-12">
                <div className="main-timeline3">
                    <div className="timeline">
                        <div className="timeline-icon"><span className="year">1 <i className="fas fa-check"></i></span></div>
                        <div className="timeline-content">
                            <h3 className="title">PhotoShoot</h3>
                            <p className="description">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lacinia mi ultrices, luctus nunc ut, commodo enim. Vivamus sem erat.
                            </p>
                        </div>
                    </div>
                    <div className="timeline">
                        <div className="timeline-icon"><span className="year">2 <i className="fas fa-check"></i></span> </div>
                        <div className="timeline-content">
                            <h3 className="title">Interview</h3>
                            <p className="description">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lacinia mi ultrices, luctus nunc ut, commodo enim. Vivamus sem erat.
                            </p>
                        </div>
                    </div>
                    <div className="timeline">
                        <div className="timeline-icon"><span className="year">3  <i class="far fa-times-circle"></i></span></div>
                        <div className="timeline-content">
                            <h3 className="title">RampWalk</h3>
                            <p className="description">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lacinia mi ultrices, luctus nunc ut, commodo enim. Vivamus sem erat.
                            </p>
                        </div>
                    </div>
                    <div className="timeline">
                        <div className="timeline-icon"><span className="year">4 <i class="far fa-times-circle"></i></span></div>
                        <div className="timeline-content">
                            <h3 className="title">Acting Class</h3>
                            <p className="description">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lacinia mi ultrices, luctus nunc ut, commodo enim. Vivamus sem erat.
                            </p>
                        </div>
                    </div>
                    <div className="timeline">
                        <div className="timeline-icon"><span className="year">5 <i class="far fa-times-circle"></i></span></div>
                        <div className="timeline-content">
                            <h3 className="title">PhotoShoot</h3>
                            <p className="description">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lacinia mi ultrices, luctus nunc ut, commodo enim. Vivamus sem erat.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    );
}
export default Timeline;