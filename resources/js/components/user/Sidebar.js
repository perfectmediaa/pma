import React from 'react'
import './app.css';
import {Link} from 'react-router-dom';
export default function Sidebar() {
    return (
        <div className="container">
    <div className="fb-profile">
        <img align="left" className="fb-image-lg" src="https://webcomicms.net/sites/default/files/clipart/163569/rainy-day-picture-163569-4893460.jpg" alt="Profile image example"/>
        <img align="left" className="fb-image-profile thumbnail rounded" src="https://www.w3schools.com/bootstrap4/paris.jpg" alt="Profile image example"/>
        <div className="fb-profile-text">
			
            <h1>Bishal Kapur</h1>
			<div className="profile-userbuttons">
					<button type="button" className="btn btn-success btn-sm ">Follow</button>
					
					<button type="button" className="btn btn-danger btn-sm ml-3 ">  <Link to="/edit">Message </Link>  </button>
				</div>
            <p>Girls just wanna go fun.</p>
			<nav>
            <Link to="/">Portfolio </Link>
            <Link to="/timeline">Progress </Link>
            <Link to="/edit">Transactio </Link>
            
        </nav>
			
        </div>
        
    </div>
		
</div>
    )
}
