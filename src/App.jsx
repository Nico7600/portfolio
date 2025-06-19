import React, { Suspense, lazy } from 'react';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import Header from './components/Header';

const Home = lazy(() => import('./pages/Home'));
const About = lazy(() => import('./pages/About'));
// Ajoute d'autres pages si besoin

function App() {
  return (
    <Router>
      <Header />
      <Suspense fallback={<div>Chargement...</div>}>
        <Routes>
          <Route path="/" element={<Home />} />
          <Route path="/about" element={<About />} />
          {/* ...existing code... */}
        </Routes>
      </Suspense>
    </Router>
  );
}

export default App;